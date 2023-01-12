<?php 


// include_once "tcpdf.php";
// echo "hola";

// echo "hola";
session_start();


// create new PDF document
function selectSingleReportage($idGET){

require "config/db.php";
$conexion = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME); 
    

$stmt = $conexion -> prepare("select * from noticias where codin= ?"); // inserta registres a bases de dades
$stmt ->bind_param("i",
    $idGET
);

$ok = $stmt -> execute();


$stmt -> bind_result($id, $title, $date, $description, $article, $author);
$stmt -> fetch();

if(!$id){
    if(isset($_SESSION['logueado']) && $_SESSION['logueado'] ){
        // die("Acceso denegado!! necessita una cuenta activa para acceder aqui");
        header("location: index.php?action=priv-space");
    }
    // else{
        // header("location: index.php");

    // }
    // die("La noticia que busca no esta disponible");

}



$arrayNewsSpecifications = array(   // ho assigno a un array associatiu per exportar els registres de DB.
    "codin"         => $id, 
    "titulo"        => $title, 
    "fecha"         => $date, 
    "descripcio"    => $description, 
    "article"       => $article, 
    "autor"         => $author
);


$stmt -> close();
$conexion ->close();
return $arrayNewsSpecifications;
}


$register = selectSingleReportage($idGET);

ob_start(); // Un dels error mes comuns es que s'envii al navegador alguna cosa abans de la funcio output del php, amb aixo ho agafo i ho executo al final amb la funció "ob_end_flush();"
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setPrintFooter(true);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Alejandro Mendoza');
$pdf->setTitle($register['titulo']);
$pdf->setSubject('Prove message');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

$pdf->setFooterData(array(0,64,0), array(0,64,128), 'C', date("m/d/Y H\hi:s"));
// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Denis S.L", "Autor: ".$register['autor']."\nLink: http://localhost/DaW2/PHP/UF3/Practica2_CMS/index.php?action=show-new&id=".$register['codin']."", array(0,64,255), array(0,64,128));
// $pdf->writeHTML("Ejemplo de pie de página", true, false, true, false, '');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->setFont('helvetica', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

$titulo = $register['titulo'];
$author = $register['autor'];
$fecha  = $register['fecha'];
$descr  = $register['descripcio'];
$article= $register['article'];

$current_date = date("m/d/Y H\hi:s");

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
$html = <<<EOD
<h1>$titulo </h1>
<i>$author  &#32;| &#32;  $fecha .h</i>
<h4>$descr</h4>
<p>$article</p>
<footer>$current_date</footer>


EOD;

// $pdf-> Cell(0, 5, date("m/d/Y H\hi:s"), 0, false, 'C', 0, '', 0, false, 'T', 'M');

// Print text using writeHTMLCell()
// $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf -> writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('post'.$register['codin'].' - '.$author.'.pdf', 'D');
ob_end_flush();
?>
