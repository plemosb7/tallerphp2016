<?php

use yii\db\Migration;

class m161108_161355_modelo_inmo extends Migration
{
    public function up()
    {
    // tabla tipo-inmueble
        $this->execute('CREATE TABLE IF NOT EXISTS `TipoInmueble` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `nombre` varchar(20) NOT NULL,
                        PRIMARY KEY (`id`),
                        KEY `id` (`id`),
                        KEY `id_2` (`id`),
                        KEY `id_3` (`id`)
                        ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;
                      ');
        
    //tabla inmueble    
        $this->execute('CREATE TABLE IF NOT EXISTS `inmueble` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `nombre` varchar(30) NOT NULL,
                        `tipoInmueble_id` int(11) NOT NULL,
                        `idCliente` int(11) NOT NULL,
                        `cantDorm` int(11) DEFAULT NULL,
                        `cantBanos` int(11) DEFAULT NULL,
                        `supTotal` int(11) DEFAULT NULL,
                        `supEdificada` int(11) DEFAULT NULL,
                        `garage` tinyint(1) DEFAULT NULL,
                        `patio` tinyint(1) DEFAULT NULL,
                        `latitud` float DEFAULT NULL,
                        `longitud` float DEFAULT NULL,
                        `foto1` varchar(30) DEFAULT NULL,
                        `foto2` varchar(30) DEFAULT NULL,
                        `foto3` varchar(30) DEFAULT NULL,
                        PRIMARY KEY (`id`),
                        KEY `tipoInmueble` (`tipoInmueble_id`),
                        KEY `idCliente` (`idCliente`),
                        KEY `tipoInmueble_id` (`tipoInmueble_id`)
                      ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

                      --
                      -- Restricciones para tablas volcadas
                      --

                      --
                      -- Filtros para la tabla `inmueble`
                      --
                      ALTER TABLE `inmueble`
                        ADD CONSTRAINT `fbk1` FOREIGN KEY (`tipoInmueble_id`) REFERENCES `tipoInmueble` (`id`),
                        ADD CONSTRAINT `fbk2` FOREIGN KEY (`idCliente`) REFERENCES `user` (`id`);
'
                );
        
        //tabla rol    
        $this->execute('CREATE TABLE IF NOT EXISTS `Rol` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `nombre` varchar(20) NOT NULL,
                        PRIMARY KEY (`id`)
                      ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
                        ');
        
        //tabla operacion    
        $this->execute('CREATE TABLE IF NOT EXISTS `Operacion` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `nombre` varchar(20) NOT NULL,
                        PRIMARY KEY (`id`)
                      ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
                      '); 
        
        //tabla rol-operacion   
        $this->execute('CREATE TABLE IF NOT EXISTS `Rol-Operacion` (
                        `rol_id` int(11) NOT NULL,
                        `operacion_id` int(11) NOT NULL,
                        PRIMARY KEY (`rol_id`,`operacion_id`),
                        KEY `Rol-Operacion_ibfk_2` (`operacion_id`)
                      ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

                      --
                      -- Restricciones para tablas volcadas
                      --

                      --
                      -- Filtros para la tabla `Rol-Operacion`
                      --
                      ALTER TABLE `Rol-Operacion`
                        ADD CONSTRAINT `fbk3` FOREIGN KEY (`rol_id`) REFERENCES `Rol` (`id`),
                        ADD CONSTRAINT `fbk4` FOREIGN KEY (`operacion_id`) REFERENCES `Operacion` (`id`);
                    ');
        
        //modificaiones a la tabla user
        $this->execute('ALTER TABLE `user` ADD `priodidad` VARCHAR( 20 ) NULL ;

                        ALTER TABLE `user` ADD `horarioAtencion` VARCHAR( 20 ) NULL ;

                        ALTER TABLE `user` ADD `telefono` VARCHAR( 20 ) NULL ;'
                );
        
        //tabla favoritos
        $this->execute('CREATE TABLE IF NOT EXISTS `favoritos` (
                        `cliente_id` int(11) NOT NULL,
                        `inmueble_id` int(11) NOT NULL,
                        KEY `cliente_id` (`cliente_id`,`inmueble_id`),
                        KEY `inmueble_id` (`inmueble_id`)
                      ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

                      --
                      -- Restricciones para tablas volcadas
                      --

                      --
                      -- Filtros para la tabla `favoritos`
                      --
                      ALTER TABLE `favoritos`
                      ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`inmueble_id`) REFERENCES `inmueble` (`id`),
                      ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `user` (`id`);'
                );
    }

    public function down()
    {
        echo "m161108_161355_modelo_inmo cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
