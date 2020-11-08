<?php
$awal = date('Y-m-d');
$today = date('d-m-Y', strtotime($awal));
$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('Penjualan Harian per '.$today);
$pdf->SetHeaderMargin(30);
$pdf->SetTopMargin(20);
$pdf->setFooterMargin(20);
$pdf->SetAutoPageBreak(true);
$pdf->SetAuthor('Author');
$pdf->SetDisplayMode('real', 'default');
$total = $pdf->getAliasNumPage();
$pdf->AddPage('P');
$i=0;
$html='<h3>Penjualan Harian per '.$today . $total.'</h3>
        <table cellspacing="1" bgcolor="#666666" cellpadding="1">
            <tr bgcolor="#ffffff">
                <th width="5%" align="center">No</th>
                <th width="25%" align="center">Nama Produk</th>
                <th width="5%" align="center">Qty</th>
                <th align="center">Tanggal</th>
                <th align="center">Pembeli</th>
                <th align="center">Harga</th>
            </tr>';
foreach ($data as $row) 
    {
        $i++;
        $html.='<tr bgcolor="#ffffff">
                <td align="center">'.$i.'</td>
                <td>'.$row['nama_produk'].'</td>
                <td>'.$row['qty'].'</td>
                <td>'.$row['tanggal'].'</td>
                <td>'.$row['nama_pembeli'].'</td>
                <td align="right">'.number_format($row['total_harga'],0,",",",").'</td>
            </tr>';
    }
$html.='</table>';
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('Penjualan Harian per '.$today.'.pdf', 'I');
?>