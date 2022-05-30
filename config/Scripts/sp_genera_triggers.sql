DROP PROCEDURE IF EXISTS sp_genera_triggers;
DELIMITER $$
CREATE PROCEDURE sp_genera_triggers (IN schema_auditar VARCHAR(50), 
                                     IN tablasNo LONGTEXT CHARSET utf8)
BEGIN
    DECLARE tg_insert, tg_update, tg_delete LONGTEXT;
    DECLARE stmt, tablasTrigger LONGTEXT;
    DECLARE nombreTabla VARCHAR(50);
    DECLARE completo INT DEFAULT FALSE;
 
    -- --------------------------------------------------------
    -- [ Se escogen las tablas que están por fuera de la lista] 
    -- --------------------------------------------------------
    DECLARE tablas_lista CURSOR 
    FOR SELECT TABLE_NAME 
        FROM INFORMATION_SCHEMA.TABLES  
        WHERE TABLE_SCHEMA=schema_auditar AND 
              FIND_IN_SET(TABLE_NAME, tablasNo);
              
    DECLARE CONTINUE HANDLER
        FOR NOT FOUND SET completo = TRUE;
        
    OPEN tablas_lista;
 
    cursor_loop: LOOP
        FETCH tablas_lista INTO nombreTabla;
 
        IF completo THEN
            LEAVE cursor_loop;
        END IF;
 
        -- -------------------------------------------------------------------
        -- [ Crea los triggers INSERT/UPDATE/DELETE de las tablas permitidas ] 
        -- -------------------------------------------------------------------
        SET tg_update := CONCAT('DROP TRIGGER IF EXISTS ', 
                                 schema_auditar, 
                                 REPLACE(nombreTabla, 'tn_', '.tg_upd_'), ';\n', 
                                 'DELIMITER $$\n', 
                                 'CREATE TRIGGER ', 
                                 schema_auditar, 
                                 REPLACE(nombreTabla, 'tn_', '.tg_upd_'), '\n', 
                                 '   AFTER UPDATE ON ', nombreTabla,'\n', 
                                 '   FOR EACH ROW\n', 
                                 'BEGIN\n', 
                                 '     CALL sp_auditoria_log(\'', nombreTabla, '\',\n', 
                                 '                           \'AFTER\', \'ROW\', \'UPDATE\', \n', 
                                 '                           \'', nombreTabla, '\', \n');
                                 
        SET tg_delete := REPLACE(tg_update, 'tg_upd_', 'tg_del_');
        SET tg_delete := REPLACE(tg_delete, 'UPDATE', 'DELETE');
        SET tg_insert := REPLACE(tg_update, 'tg_upd_', 'tg_ins_');
        SET tg_insert := REPLACE(tg_insert, 'UPDATE', 'INSERT');
        
        SET stmt := (SELECT CONCAT('                           CONCAT(', 
                                   GROUP_CONCAT(CONCAT('OLD.', COLUMN_NAME) SEPARATOR ', \',\', '), 
                                   '),\n') 
                     FROM information_schema.COLUMNS 
                     WHERE TABLE_SCHEMA=BINARY schema_auditar AND 
                           TABLE_NAME=BINARY nombreTabla);
        SET tg_update := CONCAT(tg_update, stmt);
        SET tg_delete := CONCAT(tg_delete, stmt, 
                                '                           NULL', 
                                ');\nEND;\n$$\nDELIMITER ;\n\n');
        
        SET stmt := (SELECT CONCAT('                           CONCAT(', 
                                   GROUP_CONCAT(CONCAT('NEW.', COLUMN_NAME) SEPARATOR ', \',\', '), 
                                   ')') 
                     FROM information_schema.COLUMNS 
                     WHERE TABLE_SCHEMA=BINARY schema_auditar AND 
                           TABLE_NAME=BINARY nombreTabla);
        SET tg_update := CONCAT(tg_update, stmt, ');\nEND;\n$$\nDELIMITER ;\n\n');
        SET tg_insert := CONCAT(tg_insert, 
                                '                           NULL,\n', 
                                stmt, ');\nEND\n$$\nDELIMITER ;\n\n');
 
 
        SET tablasTrigger := CONCAT(tg_insert, tg_update, tg_delete);
        
        SELECT tablasTrigger;
        
    END LOOP;
    CLOSE tablas_lista;
    
    SET script := tablasTrigger;
END $$