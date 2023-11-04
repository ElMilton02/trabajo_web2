<?php
require_once './config.php';

class Model
{
  protected $db;

  public function __construct()
  {
    require_once './config.php';
    $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
    $this->deploy();
  }

  function deploy()
  {
    // Chequear si hay tablas
    $query = $this->db->query('SHOW TABLES');
    $tables = $query->fetchAll();

    if (count($tables) == 0) {
      // Si no hay tablas, crearlas
      $sql = <<<SQL
            --
            
            -- --------------------------------------------------------
            
            --
            -- Estructura de tabla para la tabla categorias
            --
            
            CREATE TABLE categorias (
              id_categoria int(11) NOT NULL,
              categoria varchar(45) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            
            --
            -- Volcado de datos para la tabla categorias
            --
            
            INSERT INTO categorias (id_categoria, categoria) VALUES
            (1, 'Camisetas'),
            (2, 'Pantalones'),
            (3, 'Zapatos'),
            (4, 'Accesorios');

            -- --------------------------------------------------------

            --
            -- Estructura de tabla para la tabla ropas
            --

            CREATE TABLE ropas (
              id_ropa int(11) NOT NULL,
              nombre_ropa varchar(45) DEFAULT NULL,
              precio_ropa decimal(10, 2) NOT NULL,
              id_categoria int(11) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            --
            -- Volcado de datos para la tabla ropas
            --

            INSERT INTO ropas (nombre_ropa, precio_ropa, id_categoria) VALUES
            ('Camiseta de algodón', 19.99, 1),
            ('Jeans clásicos', 39.99, 2),
            ('Zapatos deportivos', 49.99, 3),
            ('Bufanda de lana', 14.99, 4),
            ('Vestido estampado', 29.99, 1),
            ('Pantalón corto de mezclilla', 24.99, 2),
            ('Botas de cuero', 59.99, 3),
            ('Bolso de cuero', 34.99, 4);

            -- --------------------------------------------------------
            
            --
            -- Estructura de tabla para la tabla usuarios
            --
            
            CREATE TABLE usuarios (
              id_usuarios int(11) NOT NULL,
              nombre_usuario varchar(10) NOT NULL,
              clave_usuario varchar(256) NOT NULL,
              rol tinyint(1) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
            
            --
            -- Volcado de datos para la tabla usuarios
            --
            
            INSERT INTO usuarios (id_usuarios, nombre_usuario, clave_usuario, rol) VALUES
            (1, 'webadmin', '$2y$10\$3LOxgaLuvwoqIOemB6fikue/8Qch4SORrj0GaVfQcqlAIs984298a', 1),
            (2, 'webuser', '$2y$10\$Ghf8M42/opvlgR/1sKgqu.XZiF.QKI0CeyiMesshXC4oocFBOPXUS', 0);
            
            --
            -- Índices para tablas volcadas
            --
            
            --
            -- Indices de la tabla categorias
            --
            ALTER TABLE categorias
              ADD PRIMARY KEY (id_categoria);
            
            --
            -- Indices de la tabla ropas
            --
            ALTER TABLE ropas
              ADD PRIMARY KEY (id_ropa),
              ADD KEY id_categoria (id_categoria) USING BTREE;
            
            --
            -- Indices de la tabla usuarios
            --
            ALTER TABLE usuarios
              ADD PRIMARY KEY (id_usuarios);
            
            --
            -- AUTO_INCREMENT de las tablas volcadas
            --
            
            --
            -- AUTO_INCREMENT de la tabla categorias
            --
            ALTER TABLE categorias
              MODIFY id_categoria int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
            
            --
            -- AUTO_INCREMENT de la tabla ropas
            --
            ALTER TABLE ropas
              MODIFY id_ropa int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
            
            --
            -- AUTO_INCREMENT de la tabla usuarios
            --
            ALTER TABLE usuarios
              MODIFY id_usuarios int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
            
            --
            -- Restricciones para tablas volcadas
            --
            
            --
            -- Filtros para la tabla ropas
            --
            ALTER TABLE ropas
              ADD CONSTRAINT ropas_ibfk_1 FOREIGN KEY (id_categoria) REFERENCES categorias (id_categoria);
              COMMIT;
            SQL;

      $this->db->exec($sql);
    }
  }
}