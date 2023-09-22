<?php

namespace App\Service\Retorno;

class HeaderLote 
{  
    public $codBanco;
    public $numeroLoteRetorno;
    public $tipoRegistro;
    public $tipoOperacao;
    public $tipoServico;
    public $versaoLayoutLote;
    public $tipoInscricao;
    public $numeroInscricao;
    public $agenciaDv;
    public $codigoCedente;
    public $nomeEmpresa;
    public $numeroRetorno;
    public $dataGravacao;
    public $agencia;
    public $conta;
    public $contaDv;
    public $codigoBanco;
    public $mensagem_1;
    public $dataCredito;
    public $convenio;

    public function getCodigoBanco()
    {
        return $this->codigoBanco;
    }

    /**
     * @param string $codigoBanco
     *
     * @return $this
     */
    public function setCodigoBanco($codigoBanco)
    {
        $this->codigoBanco = $codigoBanco;

        return $this;
    }

    /**
     * @return string
     */
    public function getTipoRegistro()
    {
        return $this->tipoRegistro;
    }

    /**
     * @param string $tipoRegistro
     *
     * @return $this
     */
    public function setTipoRegistro($tipoRegistro)
    {
        $this->tipoRegistro = $tipoRegistro;

        return $this;
    }

    /**
     * @return string
     */
    public function getCodBanco()
    {
        return $this->codBanco;
    }

    /**
     * @param string $codBanco
     *
     * @return $this
     */
    public function setCodBanco($codBanco)
    {
        $this->codBanco = $codBanco;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumeroLoteRetorno()
    {
        return $this->numeroLoteRetorno;
    }

    /**
     * @param string $numeroLoteRetorno
     *
     * @return $this
     */
    public function setNumeroLoteRetorno($numeroLoteRetorno)
    {
        $this->numeroLoteRetorno = $numeroLoteRetorno;

        return $this;
    }

    /**
     * @return string
     */
    public function getTipoOperacao()
    {
        return $this->tipoOperacao;
    }

    /**
     *
     * @param string $tipoOperacao
     * @return $this
     */
    public function setTipoOperacao($tipoOperacao)
    {
        $this->tipoOperacao = $tipoOperacao;

        return $this;
    }


    /**
     * @return string
     */
    public function getTipoServico()
    {
        return $this->tipoServico;
    }

    /**
     * @param string $tipoServico
     *
     * @return $this
     */
    public function setTipoServico($tipoServico)
    {
        $this->tipoServico = $tipoServico;

        return $this;
    }


    /**
     * @return string
     */
    public function getVersaoLayoutLote()
    {
        return $this->versaoLayoutLote;
    }

    /**
     * @param string $versaoLayoutLote
     *
     * @return $this
     */
    public function setVersaoLayoutLote($versaoLayoutLote)
    {
        $this->versaoLayoutLote = $versaoLayoutLote;

        return $this;
    }


    /**
     * @return string
     */
    public function getTipoInscricao()
    {
        return $this->tipoInscricao;
    }

    /**
     *
     * @param $tipoInscricao
     *
     * @return $this
     */
    public function setTipoInscricao($tipoInscricao)
    {
        $this->tipoInscricao = $tipoInscricao;

        return $this;
    }


    /**
     * @return string
     */
    public function getNumeroInscricao()
    {
        return $this->numeroInscricao;
    }

    /**
     * @param string $numeroInscricao
     *
     * @return $this
     */
    public function setNumeroInscricao($numeroInscricao)
    {
        $this->numeroInscricao = $numeroInscricao;

        return $this;
    }

    /**
     * @return string
     */
    public function getCodigoCedente()
    {
        return $this->codigoCedente;
    }

    /**
     * @param string $codigoCedente
     *
     * @return $this
     */
    public function setCodigoCedente($codigoCedente)
    {
        $this->codigoCedente = $codigoCedente;

        return $this;
    }

    /**
     * @return string
     */
    public function getConvenio()
    {
        return $this->convenio;
    }

    /**
     * @param string $convenio
     *
     * @return $this
     */
    public function setConvenio($convenio)
    {
        $this->convenio = $convenio;

        return $this;
    }

    /**
     * @return string
     */
    public function getNomeEmpresa()
    {
        return $this->nomeEmpresa;
    }

    /**
     * @param string $nomeEmpresa
     *
     * @return $this
     */
    public function setNomeEmpresa($nomeEmpresa)
    {
        $this->nomeEmpresa = $nomeEmpresa;

        return $this;
    }

    /**
     * @return string
     */
    public function getMensagem1()
    {
        return $this->mensagem_1;
    }

    /**
     * @param string $format
     *
     * @return string
     */
    public function getDataGravacao($format = 'd/m/Y')
    {
        return $this->dataGravacao instanceof Carbon
            ? $format === false ? $this->dataGravacao : $this->dataGravacao->format($format)
            : null;
    }

    /**
     * @param string $dataGravacao
     *
     * @param string $format
     *
     * @return $this
     */
    public function setDataGravacao($dataGravacao, $format = 'dmY')
    {
        $this->dataGravacao = trim($dataGravacao, '0 ') ? Carbon::createFromFormat($format, $dataGravacao) : null;

        return $this;
    }

    /**
     * @param string $format
     *
     * @return string
     */
    public function getDataCredito($format = 'd/m/Y')
    {
        return $this->dataCredito instanceof Carbon
            ? $format === false ? $this->dataCredito : $this->dataCredito->format($format)
            : null;
    }

    /**
     * @param string $dataCredito
     *
     * @param string $format
     *
     * @return $this
     */
    public function setDataCredito($dataCredito, $format = 'dmY')
    {
        $this->dataCredito = trim($dataCredito, '0 ') ? Carbon::createFromFormat($format, $dataCredito) : null;

        return $this;
    }

    /**
     * @return string
     */
    public function getAgencia()
    {
        return $this->agencia;
    }

    /**
     * @param string $agencia
     *
     * @return $this
     */
    public function setAgencia($agencia)
    {
        $this->agencia = $agencia;

        return $this;
    }


    /**
     * @return string
     */
    public function getAgenciaDv()
    {
        return $this->agenciaDv;
    }

    /**
     * @param string $agenciaDv
     *
     * @return $this
     */
    public function setAgenciaDv($agenciaDv)
    {
        $this->agenciaDv = $agenciaDv;

        return $this;
    }

    /**
     * @return string
     */
    public function getConta()
    {
        return $this->conta;
    }

    /**
     * @param string $conta
     *
     * @return $this
     */
    public function setConta($conta)
    {
        $this->conta = $conta;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumeroRetorno()
    {
        return $this->numeroRetorno;
    }

    /**
     * @param string $numeroRetorno
     *
     * @return $this
     */
    public function setNumeroRetorno($numeroRetorno)
    {
        $this->numeroRetorno = $numeroRetorno;

        return $this;
    }

    /**
     * @return string
     */
    public function getContaDv()
    {
        return $this->contaDv;
    }

    /**
     * @param string $contaDv
     *
     * @return $this
     */
    public function setContaDv($contaDv)
    {
        $this->contaDv = $contaDv;

        return $this;
    }
}