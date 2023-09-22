<?php

namespace App\Service\Retorno;

use App\Service\Helper\Util;
use SplFileObject;

class RetornoCnabService 
{
    private SplFileObject $file;
    public Header $header;
    public HeaderLote $headerLote;
    public Trailer $trailer;
    public TrailerLote $trailerLote;
    public array $detalhes = [];
    private int $tipoRegistro;

    protected $increment = 0;

    public function __construct(string $nameFile)
    {
       $this->file = new SplFileObject($nameFile);   
       $this->header = new Header;
       $this->headerLote = new HeaderLote;
       $this->trailer = new Trailer;
       $this->trailerLote = new TrailerLote;
    }

    public function processar()
    {
        while(!$this->file->eof())
        {
            $line = $this->file->fgets();
            $this->tipoRegistro = Util::remove(8, 8, $line);

            $this->processarHeader($line);
            $this->processarHeaderLote($line);
            $this->processarDetalhe($line);
            $this->processarTrailerLote($line);
            $this->processarTrailer($line); 
        }
    }

    private function processarHeader($header)
    {
        if( $this->tipoRegistro != 0)
            return;

        $this->header
            ->setCodBanco($this->rem(1, 3, $header))
            ->setLoteServico($this->rem(4, 7, $header))
            ->setTipoRegistro($this->rem(8, 8, $header))
            ->setTipoInscricao($this->rem(18, 18, $header))
            ->setNumeroInscricao($this->rem(19, 32, $header))
            ->setCodigoCedente($this->rem(33, 41, $header))
            ->setAgencia($this->rem(53, 57, $header))
            ->setAgenciaDv($this->rem(58, 58, $header))
            ->setConta($this->rem(59, 70, $header))
            ->setContaDv($this->rem(71, 71, $header))
            ->setNomeEmpresa($this->rem(73, 102, $header))
            ->setNomeBanco($this->rem(103, 132, $header))
            ->setCodigoRemessaRetorno($this->rem(143, 143, $header))
            ->setData($this->rem(144, 151, $header))
            ->setNumeroSequencialArquivo($this->rem(158, 163, $header))
            ->setVersaoLayoutArquivo($this->rem(164, 166, $header));

        return true;
    }

    protected function processarHeaderLote($headerLote)
    {
        if( $this->tipoRegistro != 1)
            return;

        $this->headerLote
            ->setCodBanco($this->rem(1, 3, $headerLote))
            ->setNumeroLoteRetorno($this->rem(4, 7, $headerLote))
            ->setTipoRegistro($this->rem(8, 8, $headerLote))
            ->setTipoOperacao($this->rem(9, 9, $headerLote))
            ->setTipoServico($this->rem(10, 11, $headerLote))
            ->setVersaoLayoutLote($this->rem(14, 16, $headerLote))
            ->setTipoInscricao($this->rem(18, 18, $headerLote))
            ->setNumeroInscricao($this->rem(19, 33, $headerLote))
            ->setCodigoCedente($this->rem(34, 42, $headerLote))
            ->setAgencia($this->rem(54, 58, $headerLote))
            ->setAgenciaDv($this->rem(59, 59, $headerLote))
            ->setConta($this->rem(60, 71, $headerLote))
            ->setContaDv($this->rem(72, 72, $headerLote))
            ->setNomeEmpresa($this->rem(74, 103, $headerLote))
            ->setNumeroRetorno($this->rem(184, 191, $headerLote))
            ->setDataGravacao($this->rem(192, 199, $headerLote))
            ->setDataCredito($this->rem(200, 207, $headerLote));

        return true;
    }

  

    protected function processarDetalhe($line)
    {
        if($this->tipoRegistro != 3)
            return;

        if ($this->getSegmentType($line) != 'H') {
           return;
        }

        $this->incrementDetalhe();

        $detalhe = new Detalhe;
        $detalhe->setBanco($this->rem(1, 3, $line))
                ->setLoteServico($this->rem(4, 7, $line))
                ->setSequencialRegistro($this->rem(9, 13, $line))
                ->setCodSegmento($this->rem(14, 14, $line))
                ->setTipoMovimento($this->rem(15, 15, $line))
                ->setNomeMutuario($this->rem(16, 45, $line))
                ->setCodUnidade($this->rem(46, 51, $line))
                ->setCpfMutuario($this->rem(52, 62, $line))
                ->setIdMutuario($this->rem(63, 74, $line))
                ->setTipoOperacao($this->rem(97, 97, $line))
                ->setDtVencimento($this->rem(100, 105, $line))
                ->setQtParcelas($this->rem(108, 109, $line))
                ->setDtInicioContrato($this->rem(110, 117, $line))
                ->setDtFimContrato($this->rem(118, 125, $line))
                ->setValorLiberado($this->rem(126, 134, $line))
                ->setValorOperacao($this->rem(135, 143, $line))
                ->setValorParcela($this->rem(144, 152, $line))
                ->setIdContrato($this->rem(162, 181, $line))
                ->setMantenedora($this->rem(203, 207, $line))
                ->setContaCorrente($this->rem(209, 220, $line))
                ->setDigitoConta($this->rem(221, 221, $line));

        $this->detalhes[$this->increment] = $detalhe;
    }

    protected function processarTrailerLote($trailer)
    {
        if( $this->tipoRegistro != 5)
            return;

        $this->trailerLote
            ->setLoteServico($this->rem(4, 7, $trailer))
            ->setTipoRegistro($this->rem(8, 8, $trailer))
            ->setQtdRegistroLote((int) $this->rem(18, 23, $trailer));

        return true;
    }

    protected function processarTrailer($trailer)
    {
        if( $this->tipoRegistro != 9)
        return;

        $this->trailer
            ->setNumeroLote($this->rem(4, 7, $trailer))
            ->setTipoRegistro($this->rem(8, 8, $trailer))
            ->setQtdLotesArquivo((int) $this->rem(18, 23, $trailer))
            ->setQtdRegistroArquivo((int) $this->rem(24, 29, $trailer));

        return true;
    }

    protected function rem($i, $f, &$array)
    {
        return Util::remove($i, $f, $array);
    }

    protected function getSegmentType($line)
    {
        return strtoupper($this->rem(14, 14, $line));
    }

    protected function incrementDetalhe()
    {
        $this->increment++;
    }
}