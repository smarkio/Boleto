<?php
 /**
 * This code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 *
 * @author Francisco Luz <franciscoferreiraluz@yahoo.com.au>
 */

/**
 * Include the main boleto class file.
 */
include_once '../../Boleto.class.php';

$myArguments = array(
  // Merchant's bank code (NO check digit). Note that this is not the same as
  // the branch number.
  'bank_code' => '341',
  // Bank code check digit.
  // 'bank_code_cd' => 'X',
  // Merchant's branch number (NO check digit).
  'agencia' => 1354,
  'agencia_dv' => 9,
  // Merchant's account number (NO check digit).
  'conta'    => 25077,
  // Check digit of Merchant's account number.
  'conta_dv' => 9,
  // No thousand separator. Full stop for decimal separator. This is the total
  // amount before deductions/additions.
  'valor_boleto' => '1.00',
  // Generally this is used for placing the order number.
  'numero_documento' => 1000,
  // Merchant's address.
  'endereco' => 'Av. Ludovico da Riva Neto, 1226',
  // Merchant's city and state.
  'cidade_uf'=> 'Alta Floresta MT 78.580-000',
  // Merchant's name.
  'cedente'  => 'Francisco Ferreira Luz',
  // Client's name (payer)
  'sacado' => 'John Doe',
  // Vary from bank to bank, so see readme file at bancos/BANKCODE/readme.txt .
  'carteira' => '157',
  // vary from bank to bank, so see readme file at bancos/BANKCODE/readme.txt
  'carteira_nosso_numero' => '157',
  //vary from bank to bank, so see readme file at bancos/BANKCODE/readme.txt
  'nosso_numero' => '75582605',
  // Merchant's tax file number, see http://en.wikipedia.org/wiki/CNPJ for
  // more info.
  'cpf_cnpj' => '462.083.893-48', 
  // Client's address line 1, includes street name and number.
  'endereco1' => 'street name and number',
  // Client's address line 2, includes city, state and zip code.
  'endereco2' => 'city and state',
  // Check with your issuer bank for instructions on how to fill up this line.
  'demonstrativo1' => 'Your text here',
  // Check with your issuer bank for instructions on how to fill up this line.
  'demonstrativo2' => 'Your text here',
  // Check with your issuer bank for instructions on how to fill up this line
  'demonstrativo3' => 'Your text here',
  // Check with your issuer bank for instructions on how to fill up this line
  'instrucoes1' => 'Your text here',
  // Check with your issuer bank for instructions on how to fill up this line
  'instrucoes2' => 'Your text here',
  // Check with your issuer bank for instructions on how to fill up this line
  'instrucoes3' => 'Your text here',
  // Check with your issuer bank for instructions on how to fill up this line
  'instrucoes4' => 'Your text here',
  
  /**
   * Format 'dd-mm-yyyy'.
   * This is the "Due to" date field.
   * 
   * If not sent then it defaults to 5 days from the issuing date.
   *
   * You can set it to -1 to make it "cash against document" ( Contra
   * Apresentação ).
   */
   'data_vencimento' => '23-04-2012',
  
  /**
   *  Use period as the decimal separator. This is the discount field (-).
   */
  // 'desconto_abatimento' => '0.00'
  
  /**
   * Use period as the decimal separator. Combined general deductions (-).
   */
  // 'outras_deducoes' => '0.00',
  
  /**
   * Use period as the decimal separator. Interest and overdue fees (+).
   */
  // 'mora_multa' => '0.00',
  
  /**
   * Use period as the decimal separator. Combined general additions (+).
   */
  // 'outros_acrescimos' => '50.55',
  
  /**
   * If not sent then it defaults to the Merchant's name (cedente).
   * This is the value that goes in the html head <title>My title</title>
   */
  // 'title' => 'My title',
  
  /**
   * If not sent then it defaults to "Pagável em qualquer Banco até o
   * vencimento."
   */
  // 'local_pagamento' => 'Your text here',
  
  /**
   * If not sent then it defaults to R$ for BRL currency dollar sign.
   */
  // 'especie' => 'Your value here',
  
  /**
   * If not sent then it defaults to empty
   */
  // 'quantidade' => 'Your value here',
  
  /**
   * If not sent then it defaults to empty.
   */
  // 'valor_unitario' => 'Your value here',
  
  /**
   * If not sent then it defaults to empty.
   */
  // 'especie_doc' => 'Your value here',
  
  /**
   * If not sent then it defaults to the issueing date.
   */
  // 'data_processamento' => 'dd/mm/yyy',
  
  /**
   * If not sent then it defaults to empty.
   */
  // 'avalista' => 'Michael Jackson',
  
  /**
   * If not sent then it defaults to N (possible values are S for YES and N
   * for NO).
   */
  // 'aceite'=> 'Your value here',
  
  /**
   * Image location for the merchant's logo.
   */
  // 'merchant_logo' => 'images/logo.jpg',
);


// Instantiate an object and send the array of arguments through.
$myBoleto = Boleto::load_boleto($myArguments);
// You probably wont need to set this in a real life production enviroment
$myBoleto->settingsPropertySetter(array('file_location' => '../..'));

// You can change stuff around like this:
// $myBoleto->settings['bank_logo']  = 'path-to-logo/logo.jpg';

// echo '<pre>';
// print_r($myBoleto);

// If you wanna print out the html then call
$myBoleto->output();

// Use $myBoleto->output(FALSE); to only populate the output property without
// rendering the html

