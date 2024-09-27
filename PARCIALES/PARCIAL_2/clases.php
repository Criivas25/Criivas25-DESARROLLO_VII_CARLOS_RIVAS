<?php
// Interfaz Prestable
interface Prestable {
    public function obtenerDetallesPrestamo(): string;
}

// Clase abstracta RecursoBiblioteca que implementa la interfaz Prestable
abstract class RecursoBiblioteca implements Prestable {
    public $id;
    public $titulo;
    public $autor;
    public $anioPublicacion;
    public $estado;
    public $fechaAdquisicion;
    public $tipo;

    public function __construct($datos) {
        foreach ($datos as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    // Métodos getter y setter
    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    // Método abstracto para obtener detalles de préstamo
    abstract public function obtenerDetallesPrestamo(): string;
}

// Clase Libro que hereda de RecursoBiblioteca
class Libro extends RecursoBiblioteca {
    public $isbn;

    public function __construct($datos) {
        parent::__construct($datos);
        $this->isbn = $datos['isbn'] ?? '';
    }

    public function obtenerDetallesPrestamo(): string {
        return "Libro: {$this->titulo}, Autor: {$this->autor}, ISBN: {$this->isbn}";
    }
}

// Clase Revista que hereda de RecursoBiblioteca
class Revista extends RecursoBiblioteca {
    public $numeroEdicion;

    public function __construct($datos) {
        parent::__construct($datos);
        $this->numeroEdicion = $datos['numeroEdicion'] ?? 0;
    }

    public function obtenerDetallesPrestamo(): string {
        return "Revista: {$this->titulo}, Autor: {$this->autor}, Edición: {$this->numeroEdicion}";
    }
}

// Clase DVD que hereda de RecursoBiblioteca
class DVD extends RecursoBiblioteca {
    public $duracion;

    public function __construct($datos) {
        parent::__construct($datos);
        $this->duracion = $datos['duracion'] ?? 0;
    }

    public function obtenerDetallesPrestamo(): string {
        return "DVD: {$this->titulo}, Autor: {$this->autor}, Duración: {$this->duracion} minutos";
    }
}

// Clase GestorBiblioteca para cargar recursos
class GestorBiblioteca {
    private $recursos = [];

    // Método de mapeo
    private $estadosLegibles = [
        'disponible' => 'DISPONIBLE',
        'prestado' => 'PRESTADO',
        'en_reparacion' => 'EN REPARACIÓN'
    ];

    public function cargarRecursos() {
        $json = file_get_contents('biblioteca.json');
        $data = json_decode($json, true);

        foreach ($data as $recursoData) {
            switch ($recursoData['tipo']) {
                case 'libro':
                    $recurso = new Libro($recursoData);
                    break;
                case 'revista':
                    $recurso = new Revista($recursoData);
                    break;
                case 'dvd':
                    $recurso = new DVD($recursoData);
                    break;
                default:
                    continue 2;
            }
            $this->recursos[] = $recurso;
        }

        return $this->recursos;
    }

    public function agregarRecursos(RecursoBiblioteca $recurso) {
        $this->recursos[$recurso->getId()] = $recurso;
    }

    public function eliminarRecurso($id) {
        unset($this->recursos[$id]);
    }

    public function actualizarRecurso(RecursoBiblioteca $recurso) {
        if (isset($this->recursos[$recurso->getId()])) {
            $this->recursos[$recurso->getId()] = $recurso;
        }
    }

    public function actualizarEstadoRecurso($id, $nuevoEstado) {
        if (isset($this->recursos[$id])) {
            $this->recursos[$id]->setEstado($nuevoEstado);
        }
    }

    public function buscarRecursosPorEstado($estado) {
        return array_filter($this->recursos, function ($recurso) use ($estado) {
            return $recurso->getEstado() === $estado;
        });
    }

    public function listarRecursos($filtroEstado = '', $campoOrden = 'id', $direccionOrden = 'ASC') {
        $recursosFiltrados = $this->recursos;

        if ($filtroEstado) {
            $recursosFiltrados = $this->buscarRecursosPorEstado($filtroEstado);
        }

        usort($recursosFiltrados, function ($a, $b) use ($campoOrden, $direccionOrden) {
            if ($campoOrden === 'id') {
                $comparison = $a->getId() <=> $b->getId();
            } elseif ($campoOrden === 'titulo') {
                $comparison = strcmp($a->getTitulo(), $b->getTitulo());
            }

            return $direccionOrden === 'ASC' ? $comparison : -$comparison;
        });

        return $recursosFiltrados;
    }

    // Método para imprimir los recursos
    public function mostrarRecursos() {
        foreach ($this->recursos as $recurso) {
            echo $recurso->obtenerDetallesPrestamo() . "\n";
            echo "Estado: " . $this->estadosLegibles[$recurso->getEstado()] . "\n";
        }
    }
}


