<?php
  /* Programación orientada a objetos */

  /* Clase Padre
     Como esta clase es en sí un concepto genérico de lo que se desea representar.
     No representa nada concreto entonces la declaramos como una clase abstracta,
     de manera que no podrá ser instanciada si no a través de las clases hijas  */
  abstract class Unidad {
    /* Propiedades (Atributos) */
    protected $vivo = true,
              $nombre;

    /* Constructor */
    public function __construct( $nombre ) {
      $this -> nombre = $nombre;
    }

    /* Getter */
    public function getNombre() {
      return $this -> nombre;
    }

    /* Métodos (Acciones) */
    public function mover( $direccion ) {
      show( "$this->nombre avanza hacia el $direccion" );
    }

    /* Hacemos que el método sea genérico, es decir, le indicamos que como 'Unidad'
      debe realizar un ataque pero no especificamos que tipo de ataque. Esto obliga
      a que el comportamiento sea definido en las clases hijas */
    abstract public function atacar( Unidad $oponente );

    public function muere() {
      show( "$this->nombre muere" );
    }
    # NOTA: Las clases no deben imprimir mensajes, pero lo haremos para realizar el ejemplo
  }

  # Clase Hijo hereda de la clase 'Unidad'
  class Soldado extends Unidad {
    /* Métodos (Acciones) */
    public function atacar( Unidad $oponente ) {
       show( "$this->nombre corta a {$oponente->getNombre()} en dos" );
       $oponente -> muere();
    }
  }

  # Clase Hijo hereda de la clase 'Unidad'
  class Arquero extends Unidad {
    /* Métodos (Acciones) */
    public function atacar( Unidad $oponente ) {
       show( "$this->nombre dispara una flecha a {$oponente->getNombre()}" );
       $oponente -> muere();
    }
  }

  # Instancia con la nueva clase 'Soldado'
  $bryan = new Soldado( 'Muñoz' );

  # Instancia con la clase Padre 'Unidad'
  $jhonny = new Arquero( 'Cortes' );
  $jhonny -> atacar( $bryan );

  # Función para evitar la duplicación del código (definición de los tags de párrafo y el echo)
  function show( $mensaje ) {
    echo "<p>$mensaje</p>";
  }

?>
