<?php
/**
 * Ponto
 *
 * Registra o ponto (entrada/saída)
 *
 * PHP version 5
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @author     Thiago Paes - mrprompt@gmail.com
 * @package    Ponto
 * @subpackage Ponto
 * @filesource ponto.php
 * @copyright  Copyright 2011, Thiago Paes
 * @link       http://github.com/mrprompt/Ponto/
 * @version    $Revision: 0.1 $
 * @license    http://www.opensource.org/licenses/mit-license.php The MIT License
 */
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true ");
header("Access-Control-Allow-Methods: OPTIONS, GET, POST");
header("Access-Control-Allow-Headers: Content-Type, Depth, User-Agent, X-File-Size, X-Requested-With, If-Modified-Since, X-File-Name, Cache-Control");
header("Content-type:application/json");

/**
 * @see Ponto
 */
require_once __DIR__ . '/../src/Ponto.php';

$retorno = null;

// se não for um ajax já paro
if (empty($_SERVER['HTTP_X_REQUESTED_WITH'])
        || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest') {
    die();
}

try {
    $objPonto = new \Ponto();
    $objPonto->setId($_POST['usuario'])
             ->setObs($_POST['observacao'])
             ->saida();

    $retorno = 'Ponto registrado com sucesso!';
} catch (Exception $e) {
    $retorno = $e->getMessage();
}

echo json_encode($retorno);
