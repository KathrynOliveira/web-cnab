<?php

namespace App\Service\Retorno;

class Detalhe 
{
    public $banco;
    public $loteServico;
    public $sequencialRegistro;
    public $codSegmento;
    public $tipoMovimento;
    public $nomeMutuario;
    public $codUnidade;
    public $cpfMutuario;
    public $idMutuario;
    public $tipoOperacao;
    public $dtVencimento;
    public $qtParcelas;
    public $dtInicioContrato;
    public $dtFimContrato;
    public $valorLiberado;
    public $valorOperacao;
    public $valorParcela;
    public $idContrato;
    public $mantenedora;
    public $contaCorrente;
    public $digitoConta;

    public function setBanco($value)
    {
        $this->banco = $value;

        return $this;
    }

    public function setLoteServico($value)
    {
        $this->loteServico = $value;

        return $this;
    }

    public function setSequencialRegistro($value)
    {
        $this->sequencialRegistro = $value;

        return $this;
    }

    public function setCodSegmento($value)
    {
        $this->codSegmento = $value;

        return $this;
    }

    public function setTipoMovimento(string $tipoMovimento)
    {
        $this->tipoMovimento = $tipoMovimento;

        return $this;
    }

    public function setNomeMutuario($nomeMutuario)
    {
        $this->nomeMutuario = $nomeMutuario;

        return $this;
    }

    public function setCodUnidade($codUnidade)
    {
        $this->codUnidade = $codUnidade;

        return $this;
    }

    public function setCpfMutuario($cpfMutuario)
    {
        $this->cpfMutuario = $cpfMutuario;

        return $this;
    }

    public function setIdMutuario($idMutuario)
    {
        $this->idMutuario = $idMutuario;

        return $this;
    }

    public function setTipoOperacao($tipoOperacao)
    {
        $this->tipoOperacao = $tipoOperacao;

        return $this;
    }

    public function setDtVencimento($dtVencimento)
    {
        $this->dtVencimento = $dtVencimento;

        return $this;
    }

    public function setQtParcelas($qtParcelas)
    {
        $this->qtParcelas = $qtParcelas;

        return $this;
    }

    public function setDtInicioContrato($dtInicioContrato)
    {
        $this->dtInicioContrato = $dtInicioContrato;

        return $this;
    }

    public function setDtFimContrato($dtFimContrato)
    {
        $this->dtFimContrato = $dtFimContrato;

        return $this;
    }

    public function setValorLiberado($valorLiberado)
    {
        $this->valorLiberado = $valorLiberado;

        return $this;
    }

    public function setValorOperacao($valorOperacao)
    {
        $this->valorOperacao = $valorOperacao;

        return $this;
    }

    public function setValorParcela($valorParcela)
    {
        $this->valorParcela = $valorParcela;

        return $this;
    }

    public function setIdContrato($idContrato)
    {
        $this->idContrato = $idContrato;

        return $this;
    }

    public function setMantenedora($mantenedora)
    {
        $this->mantenedora = $mantenedora;

        return $this;
    }

    public function setContaCorrente($contaCorrente)
    {
        $this->contaCorrente = $contaCorrente;

        return $this;
    }

    public function setDigitoConta($digitoConta)
    {
        $this->digitoConta = $digitoConta;

        return $this;
    }
}