
<!DOCTYPE html>
<html lang="en">
<head> 
	<title><?php echo $page_title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<!-- App favicon -->
	<link rel="shortcut icon" href="<?= base_url( '/public/img/favicon.ico' )?>">

	<style>
		.table-data, .table-data> td, .table-data> th {
			border: 1px solid;
		} 
		table {
			width: 100%;
			border: 1px solid;
			border-collapse: collapse;
		} 
		.page-title{ 
			font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; 
			font-size: 18px !important;
		}
		.text-size-8{
			font-size: 8px !important;
		}
		.text-size-9{
			font-size: 9px !important;
		}
		.text-size-10{
			font-size: 10px !important;
		}
		.text-size-11{
			font-size: 11px !important;
		}
		.text-size-12{
			font-size: 12px !important;
		}
		.text-size-13{
			font-size: 13px !important;
		}
		.text-size-14{
			font-size: 14px !important;
		}
		.text-center{
			text-align: center !important;
		}
		.text-bold{
			font-weight: bold;
		}
		.text-right{
			text-align: right !important;
		}
		.text-italic{
			font-style: italic !important;
		}
		.border-right{
			border-right: 1px solid black;
		}
		.border-left{
			border-left: 1px solid black;
		}
		.border-top{
			border-top: 1px solid black;
		}
		.border-bottom{
			border-bottom: 1px solid black;
		}
		.border{
			border: 1px solid black;
		}
		/* 8+4 */  
		
	</style>
</head>
<body>
	<?php   
		foreach(range(1, $tot_page) as $page){
			
	?>
		<table id="table" >
			<tr>
				<td colspan="13" class="page-title text-center text-bold">SCHOLARSHIP GRANT PAYROLL</td>
			</tr>
			<tr> 
				<td colspan="8"></td>  
				<td colspan="4" class="text-size-11 text-bold">For the period:  <?php echo $sem; ?> Semester of <?php echo str_replace("SY: ", "", $school_year); ?></td>
				<td></td>
			</tr>
			<tr class="text-size-11 text-bold"> 
				<td>LGU:</td>
				<td colspan="7">OFFICE OF THE CITY MAYOR</td> 
				<td colspan="4">Payroll No: ________________</td>
				<td></td> 
			</tr>
			<tr class="text-size-11 text-bold"> 
				<td>Fund:</td>
				<td colspan="7">OCM - MOOE - Scholarship Grants/Expenses (GAD Program)</td> 
				<td colspan="4">Sheet  <?php echo $page; ?> of <?php echo $tot_page; ?> Sheets</td>
				<td></td> 
			</tr>
			<tr class="text-size-11"> 
				<td></td>
				<td colspan="12">We hereby acknowledge to have received from MR. ROEL T. VISITACION, City Treasurer, the sum herein specified
					opposite our respective names, the same being as FINANCIAL SUPPORT/ASSISTANCE as Beneficiaries of the city's Scholarship
					Grant (Senior High School) for the
					<?php 
						$semester = "";
						if($sem == "1st"){
							$semester = "FIRST";
						}
						if($sem == "2nd"){
							$semester = "SECOND"; 
						}
						echo $semester;
					?>
					
					SEMESTER of <?php echo str_replace("SY: ", "", $school_year); ?>, the correctness of which we hereby severally certify.</td>  
			</tr> 
			<tr class="text-size-11 text-bold table-data" > 
				<th>Seq</th>
				<th rowspan="2">Name</th>
				<th rowspan="2">Address</th>
				<th rowspan="2" colspan="2">Strand</th>
				<th rowspan="2">Year Level</th>
				<th rowspan="2">School</th>
				<th rowspan="2">AVAILMENT</th>
				<th>AMOUNT</th>
				<th>Seq</th>
				<th rowspan="2" colspan="2">SIGNATURE</th>
				<th rowspan="2">REMARKS</th>
			</tr>
			<tr class="text-size-11 text-bold table-data" > 
				<th>Nbr</th>  
				<th>DUE</th>    
				<th>Nbr</th>   
			</tr> 
			<?php
				$to         = $page * 20; 
				$amount     = 2000;
				$tot_amount = 0;
				$row        = 0;
				foreach(range($from, $to) as $num){
					
					$profile    = $result[$num-1];
					$name       = ucwords( $profile->lastname . ", " . $profile->firstname . " " . $profile->middlename . " " . $profile->suffix );
					$address    = ucwords( $profile->address );
					$strand     = $profile->course;
					$year_level = $profile->appyear;
					$school     = $profile->school;
					$availment  = $profile->availment;
					$school     = $profile->school;

					if($num == $tot_record){
			?>
						<tr class="text-size-11 table-data"> 
							<td class="text-right"><?php echo $num; ?></td>
							<td><?php echo $name;?> </td>
							<td class="text-center"><?php echo $address;?></td>
							<td class="text-center" colspan="2"><?php echo $strand;?></td>  
							<td class="text-center" ><?php echo $year_level;?></td>
							<td class="text-center" ><?php echo $school;?></td>
							<td class="text-center" ><?php echo $availment;?></td>
							<td class="text-right"><?php echo  number_format($amount, 2, '.', ',')  ?></td>
							<td class="text-right"><?php echo $num; ?></td>
							<td colspan="2"> </td> 
							<td> </td> 
						</tr>
			<?php 	
							$tot_amount += $amount; 
						break;
					} else{ 
			?>
						<tr class="text-size-11 table-data"> 
							<td class="text-right"><?php echo $num; ?></td>
							<td><?php echo $name;?> </td>
							<td class="text-center"><?php echo $address;?></td>
							<td class="text-center" colspan="2">GAS</td>  
							<td class="text-center" ><?php echo $year_level;?></td>
							<td class="text-center" ><?php echo $school;?></td>
							<td class="text-center" ><?php echo $availment;?></td>
							<td class="text-right"><?php echo  number_format($amount, 2, '.', ',')  ?></td>
							<td class="text-right"><?php echo $num; ?></td>
							<td colspan="2"> </td> 
							<td> </td> 
						</tr>
			<?php 
						$tot_amount += $amount; 
					} 
					$row++;
					$from += 1;
				}
			?>
			<?php  
				$curennt_num = $num;
				if($row !==20){
					foreach(range($row + 2,20) as $blank_row){ 
			?> 	
						<tr class="text-size-11 table-data"> 
							<td class="text-right"><?php echo $curennt_num+=1; ?></td>
							<td></td>
							<td class="text-center"></td>
							<td class="text-center" colspan="2"></td>  
							<td class="text-center"></td>
							<td class="text-center"></td>
							<td class="text-center"></td>
							<td class="text-right"></td>
							<td class="text-right"><?php echo $num+=1; ?></td>
							<td colspan="2"></td> 
							<td> </td> 
						</tr>
			<?php
					}
				} 
				
				
			?>
					
					
			 
			<tr class="text-center text-size-11 text-bold table-data" >
				<td></td>
				<td colspan="7" >SUB TOTAL</td>
				<td class="text-right"><?php echo  number_format($tot_amount, 2, '.', ','); ?></td>
				<td></td> 
				<td colspan="2"></td>
				<td></td>
			</tr> 
			<tr class="text-size-11">
				<td colspan="3" class="border-right"><span class="text-bold">A. CERTIFIED:</span> Each person whose name appears above are approved</td>
				<td colspan="5" class="border-right"><span class="text-bold">B. CERTIFIED:</span> Supporting documents complete and proper.</td>
				<td colspan="5" class="border-right"><span class="text-bold">C. CERTIFIED:</span> Cash available for the purpose.</td> 
			</tr>
			<tr class="text-size-11">
				<td colspan="3" class="border-right">beneficiaries of the city's Scholarship Program.</td>
				<td colspan="5" class="border-right"> </td> 
				<td colspan="5" class="border-right"> </td> 
			</tr>
			<tr class="text-size-11">
				<td colspan="3" class="border-right">&nbsp;</td>
				<td colspan="5" class="border-right">&nbsp;</td> 
				<td colspan="5" class="border-right">&nbsp;</td> 
			</tr>
			<tr class="text-size-11 text-center text-bold">
				<td></td> 
				<td><?php echo $config->chairman; ?></td> 
				<td class="border-right border-bottom"></td> 
				<td colspan="3"><?php echo $config->city_accountant; ?></td> 
				<td class="border-right border-bottom" colspan="2"></td> 
				<td colspan="3"><?php echo $config->city_treasurer; ?></td> 
				<td colspan="2" class="border-bottom"></td> 
			</tr>
			<tr class="text-size-11 text-center border-bottom">
				<td></td> 
				<td class="text-italic">Chairman, Scholarship Screening Committee</td> 
				<td class="border-right" >Date</td> 
				<td class="text-italic" colspan="3">City Accountant</td> 
				<td class="border-right"  colspan="2">Date</td> 
				<td class="text-italic" colspan="3">City Treasurer</td>
				<td colspan="2">Date</td> 
			</tr>
			<tr class="text-size-11">
				<td colspan="3"  class="border-right" ><span class="text-bold">D.    APPROVED FOR PAYMENT: P</span>____________</td> 
				<td colspan="5"  class="border-right" ><span class="text-bold">E.      CERTIFIED:</span> Each person whose name appears on the payroll has </td> 
				<td><span class="text-bold">F.</span></td>  
				<td colspan="4"> </td>   
			</tr>
			<tr class="text-size-11">
				<td colspan="3" class="border-right" ></td> 
				<td colspan="5" class="border-right" >been paid the amount as indicated opposite his/her name</td> 
				<td colspan="5" class="border-right" > </td>   
			</tr>
			<tr class="text-size-11">
				<td colspan="3" class="border-right" >&nbsp;</td>
				<td colspan="5" class="border-right" >&nbsp;</td> 
				<td colspan="5" class="border-right" >&nbsp;</td>   
			</tr>
			<tr class="text-size-11 text-center">
				<td></td> 
				<td class="text-bold "><?php echo $config->city_administrator; ?></td> 
				<td class="border-right border-bottom"></td> 
				<td colspan="3" class="border-bottom"></td> 
				<td colspan="2" class="border-right border-bottom"></td> 
				<td colspan="2" class="text-right">CAFOA No: </td> 
				<td colspan="3" class="border-bottom"></td>  
			</tr>
			<tr class="text-size-11 border-bottom text-center">
				<td></td> 
				<td class="text-italic">City Administrator</td>  
				<td class="text-italic border-right">Date</td> 
				<td colspan="3" class="text-italic">Disbursement Officer</td>  
				<td colspan="2" class="text-italic border-right">Date</td> 
				<td colspan="2" class="text-right">Date:</td> 
				<td colspan="3"></td> 
			</tr>
			<tr class="text-size-11 text-bold">
				<td colspan="4">G. ACCOUNTING ENTRIES</td>  
				<td></td> 
				<td></td> 
				<td></td> 
				<td class="border-right"></td> 
				<td></td> 
				<td></td> 
				<td></td> 
				<td></td> 
				<td></td>  
			</tr>
			<tr class="text-size-11 text-center">
				<td colspan="2" class="border">Particulars </td>  
				<td class="border">Account Code</td> 
				<td class="border">Debit</td> 
				<td class="border">Credit</td> 
				<td></td>  
				<td class="border" colspan="2">Particulars</td> 
				<td class="border" >Account Code</td> 
				<td class="border"  colspan="2">Debit</td> 
				<td class="border" >Credit</td>  
				<td></td>   
			</tr>
			<tr class="text-size-11">
				<td class="border" colspan="2">&nbsp;</td>  
				<td class="border">&nbsp;</td> 
				<td class="border">&nbsp;</td> 
				<td class="border">&nbsp;</td> 
				<td>&nbsp;</td>   
				<td class="border" colspan="2">&nbsp;</td>  
				<td class="border">&nbsp;</td> 
				<td class="border" colspan="2">&nbsp;</td>  
				<td class="border">&nbsp;</td>  
				<td>&nbsp;</td>   
			</tr>
			<tr class="text-size-11 border-bottom">
				<td class="border" colspan="2">&nbsp;</td>  
				<td class="border">&nbsp;</td> 
				<td class="border">&nbsp;</td> 
				<td class="border">&nbsp;</td> 
				<td >&nbsp;</td>   
				<td class="border" colspan="2">&nbsp;</td>  
				<td class="border">&nbsp;</td> 
				<td class="border" colspan="2">&nbsp;</td>  
				<td class="border">&nbsp;</td>  
				<td>&nbsp;</td>   
			</tr>
			<tr class="text-size-11 text-italic">
				<td colspan="2">Prepared by:</td>  
				<td></td> 
				<td></td> 
				<td></td> 
				<td></td> 
				<td></td> 
				<td colspan="6">Certified Correct:</td>  
			</tr>
			<tr class="text-size-11">
				<td colspan="2">____________________________________________</td>  
				<td></td> 
				<td></td> 
				<td></td> 
				<td></td> 
				<td></td> 
				<td colspan="6">_____________________________________________</td>  
			</tr>
			<tr class="text-size-11">
				<td colspan="7"></td>   
				<td colspan="6" class="text-italic">Head, Accounting Department/Unit</td>
			</tr> 
		</table>
		<p class="text-size-11 text-italic">Attachments:  (1) CAFOA (2)List of Approved Scholarship Applicants for the <?php echo $sem ?> Semester of  <?php echo $sem ?> (3) Barangay Clearances (4)Certificates of Indigency(5) Certificates of Enrolment</p>
		<br> 
	<?php
		}
	?>
</body>
</html>