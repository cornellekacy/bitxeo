$(document).ready(function() {
	//fee calculator frontend
														$("#calculate").on("click",function() {
															var amount = parseFloat($("#amount").val());
															var fee_payer = $("#fee_payer").val();
															var escrow_amount = 0;
															var btc_buyer_fee = 0;
															var btc_seller_fee = 0;
															var btc_tx_fee = 0;
															var buyer_pays = 0;
															var seller_receives = 0;
															if(fee_payer == 1){
																escrow_amount = amount;
																btc_buyer_fee = amount * 0.01;
																btc_seller_fee = 0;
																btc_tx_fee = 0.0004;
																buyer_pays = amount + btc_buyer_fee;
																seller_receives = amount -  0.0004;
															}else if(fee_payer == 2){
																escrow_amount = amount;
																btc_buyer_fee = 0;
																btc_seller_fee = amount * 0.01;
																btc_tx_fee = 0.0004;
																buyer_pays = amount ;
																seller_receives = amount - btc_seller_fee -  0.0004;
															}else if(fee_payer == 3){
																escrow_amount = amount;
																btc_buyer_fee = amount * 0.005;
																btc_seller_fee = amount * 0.005;
																btc_tx_fee = 0.0004;
																buyer_pays = amount + btc_buyer_fee ;
																seller_receives = amount + btc_buyer_fee - btc_seller_fee -  0.0004;
															}

															$("#escrow_amount").html(amount);
															$("#btc_buyer_fee").html(btc_buyer_fee);
															$("#btc_seller_fee").html(btc_seller_fee);
															$("#btc_tx_fee").html(btc_tx_fee);
															$("#buyer_pays").html(buyer_pays);
															$("#seller_receives").html(seller_receives);
														 });
													});