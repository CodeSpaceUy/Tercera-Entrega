<?php

class Tutorias{
    private $id; 
    private $id_profe; 
    private $nombre; 
    private $curso;
    private $periodo; 
    private $fecha_inicio; 
    private $fecha_fin; 
    private $hora; 
    private $comentarios;
	private $activa;
    private $archivo;




    public function getArchivo() {
        return $this->archivo;
    }
    public function setArchivo($archivo) {
        $this->archivo = $archivo;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id_profe
     */
    public function getIdProfe()
    {
        return $this->id_profe;
    }

    /**
     * Set the value of id_profe
     */
    public function setIdProfe($id_profe): self
    {
        $this->id_profe = $id_profe;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of curso
     */
    public function getCurso()
    {
        return $this->curso;
    }

    /**
     * Set the value of curso
     */
    public function setCurso($curso): self
    {
        $this->curso = $curso;

        return $this;
    }

    /**
     * Get the value of periodo
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * Set the value of periodo
     */
    public function setPeriodo($periodo): self
    {
        $this->periodo = $periodo;

        return $this;
    }

    /**
     * Get the value of fecha_inicio
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * Set the value of fecha_inicio
     */
    public function setFechaInicio($fecha_inicio): self
    {
        $this->fecha_inicio = $fecha_inicio;

        return $this;
    }

    /**
     * Get the value of fecha_fin
     */
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    /**
     * Set the value of fecha_fin
     */
    public function setFechaFin($fecha_fin): self
    {
        $this->fecha_fin = $fecha_fin;

        return $this;
    }

    /**
     * Get the value of hora
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set the value of hora
     */
    public function setHora($hora): self
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get the value of comentarios
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }

    /**
     * Set the value of comentarios
     */
    public function setComentarios($comentarios): self
    {
        $this->comentarios = $comentarios;

        return $this;
    }

	/**
	 * Get the value of activa
	 */
	public function getActiva()
	{
		return $this->activa;
	}

	/**
	 * Set the value of activa
	 */
	public function setActiva($activa): self
	{
		$this->activa = $activa;

		return $this;
	}

    
  
}


?>