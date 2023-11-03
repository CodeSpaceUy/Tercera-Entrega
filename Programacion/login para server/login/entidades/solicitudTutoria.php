<?php

class STutorias{
    private $idSolicitud; 
    private $asunto; 
    private $CI; 
    private $curso;
    private $periodo; 
    private $comentarios; 
    



    public function getIdSolicitud(){
		return $this->idSolicitud;
	}

	public function setIdSolicitud($idSolicitud){
		$this->idSolicitud = $idSolicitud;
	}

	public function getAsunto(){
		return $this->asunto;
	}

	public function setAsunto($asunto){
		$this->asunto = $asunto;
	}

	public function getCI(){
		return $this->CI;
	}

	public function setCI($CI){
		$this->CI = $CI;
	}

	public function getCurso(){
		return $this->curso;
	}

	public function setCurso($curso){
		$this->curso = $curso;
	}

	public function getPeriodo(){
		return $this->periodo;
	}

	public function setPeriodo($periodo){
		$this->periodo = $periodo;
	}

	public function getComentarios(){
		return $this->comentarios;
	}

	public function setComentarios($comentarios){
		$this->comentarios = $comentarios;
	}
  
}


?>