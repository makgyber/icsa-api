<?php

namespace App\Http\Controllers;

use App\Models\Withdrawal;
use App\Http\Requests\WithdrawRequest;

use Illuminate\Http\Request;
use App\Traits\ApiResponser;

class WithdrawalController extends Controller
{
	use ApiResponser;

    public function withdraw(WithdrawRequest $request) {
		$data = $request->validated();
		$data['user_id'] = request()->user()->ID;

		$withdrawal = Withdrawal::create($data);
        
        return $this->success(['withdrawal'  => $withdrawal]);

    }

    public function banks() {
        return $this->success(['banks' => [
        	"ABN Amro Bank 10-Digits[ABN]",
			"Allied Bank 10-Digits[AB]",
			"Allied Savings Bank  10-Digits[ASB]",
			"AMA Bank  16-Digits[AMA]",
			"ANZ Bank  11-Digits[ANZ]",
			"Asia Trust Development Bank  10-Digits[ATB]",
			"Asia United Bank  10-Digits[AUB1]",
			"Asia United Bank  12-Digits via InstaPay[AUB]",
			"Asian Development Bank  10-Digits[ADB]",
			"Banco De Oro Unibank",
			"Bangko Mabuhay 12-Digits via InstaPay[BMB]",
			"Bangkok Bank  13-Digits[BANGK]",
			"Bank of Commerce  12-Digits via InstaPay[BOC]",
			"Bank of the Philippine Islands via InstaPay[BPI]",
			"Bank of Tokyo  13-Digits[BOT]",
			"Bank One Savings and Trust Corp  10-Digits[BONE]",
			"BPI Direct BanKo Inc. 12-Digits via InstaPay[BGB]",
			"BPI Family Savings Bank  10-Digits[BPIF]",
			"China Bank  10-Digits via InstaPay[CB]",
			"China Bank  12-Digits[CBC]",
			"China Bank Savings 10-Digits via InstaPay[CBS]",
			"China Bank Savings 12-Digits via InstaPay[CBS1]",
			"Chinatrust Bank  12-Digits via InstaPay[CTB]",
			"Citibank  10-Digits[CITI]",
			"Citibank  16-Digits[CITI1]",
			"CitiBank Savings  10-Digits[CITIS]",
			"CitiBank Savings 16-Digits[CITS1]",
			"City Savings Bank  10-Digits[CITY]",
			"City State Savings  12-Digits[CITE]",
			"DBP  10-Digits via InstaPay[DBP]",
			"DBP  13-Digits[DBP13]",
			"Deutsche Bank  10-Digits[DB]",
			"Dungganon Bank 13-Digits via Instapay[DBI]",
			"East West Bank 10-Digits via InstaPay[EWB]",
			"East West Bank 12-Digits via InstaPay[EWBC]",
			"Ecology Savings Bank  10-Digits[EB]",
			"Equicom Savings Bank 11-Digits[EQSB]",
			"Equicom Savings Bank 14-Digits via InstaPay[EQB]",
			"Filipino Savers Bank (A Rural Bank)  10-Digits[PILSB]",
			"First Allied Bank  10-Digits[FAB]",
			"First Consolidated Bank  14-Digits[FCB]",
			"First Macro Bank  8-Digits[FMB]",
			"G Exchange, Inc.[GXI]",
			"GSIS Family Bank  12-Digits[GSIS]",
			"Guagua Saving Bank (Rural Bank)  8-Digits[GSB]",
			"Hongkong and Shanghai Bank  12-Digits[HSBC]",
			"HSBC Savings  12-Digits[HSBCS]",
			"ING Bank N.V. 12-Digits via InstaPay[ING]",
			"Insular Savings Bank  10-Digits[ISB]",
			"International Exchange Bank 12-Digits[IBANK]",
			"Isla Bank Inc. 14-Digits via InstaPay[IBI]",
			"Islamic Bank (Al-Amanah Bank)  10-Digits[ISLAM]",
			"Land Bank of the Philippines via InstaPay[LBP]",
			"Luzon Development Bank  10-Digits[LDB]",
			"Malayan Bank  15-Digits[MAL]",
			"Malayan Savings Bank 12-Digits via InstaPay[MSB]",
			"MayBank Phils  11-Digits via InstaPay[MAY 1]",
			"MayBank Phils  12-Digits[May]",
			"Metrobank  10-Digits[MBTC1]",
			"Metrobank 13-Digits via InstaPay[MBTC]",
			"Omnipay, Inc. 16-Digits via InstaPay[OPI]",
			"Partner Rural Bank (Cotabato), Inc. via InstaPay[PAR]",
			"PayMaya",
			"Pen Bank 10-Digits[PBANK]",
			"Phil Business Bank 12-Digits via InstaPay[PBB]",
			"Phil National Bank  10-Digits[PNB]",
			"Phil National Bank  12-Digits via InstaPay[PNB1]",
			"Phil National Bank Savings 10-Digits via InstaPay[PNBS]",
			"Phil National Bank Savings 12-Digits via InstaPay[PNBS1]",
			"Phil National Bank Savings 16-Digits via InstaPay[PNBS2]",
			"Phil Postal Savings Bank  12-Digits[POB]",
			"Philippine Bank of Communications via InstaPay[PBCOM]",
			"Philippine Savings Bank  12-Digits via InstaPay[PSB]",
			"Philippine Trust Company  10-Digits[PTC]",
			"Philippine Trust Company  12-Digits via InstaPay[PTB]",
			"Philippine Veterans Bank  10-Digits[PVB]",
			"Philippine Veterans Bank  13-Digits via InstaPay[PVB1]",
			"Planters Development Bank  10-Digits[PLB]",
			"Premiere Development Bank  12-Digits[PRB]",
			"Quezon Capital Rural Bank via Instapay[QRB]",
			"RCBC 10-Digits via InstaPay[RCBC]",
			"RCBC 16-Digits via InstaPay[RCI]",
			"RCBC Savings  10-Digits[RCBCS]",
			"Robinsons Bank Corp  12-Digits[RSB]",
			"Robinsons Bank Corp 15-Digits via InstaPay[RSB1]",
			"Sarangani Rural Bank  10-Digits[SARAN]",
			"Security Bank 13-Digits via InstaPay[SB]",
			"Security Bank Savings 13-Digits[SBS]",
			"Standard Chartered Bank  13-Digits[SCB]",
			"Sterling Bank  12-Digits via InstaPay[STRBK]",
			"Sterling Bank 15-Digits via InstaPay[STRBK1]",
			"Sterling Bank 16-Digits via InstaPay[STRBK 2]",
			"Summit Bank  8-Digits[SMB]",
			"Sun Savings Bank via InstaPay[SSB]",
			"UCPB  10-Digits via InstaPay[UCPB]",
			"UCPB 12-Digits via InstaPay[UCPB1]",
			"UCPB Savings Bank  10-Digits[UCPBS]",
			"UCPB Savings Bank  11-Digits via InstaPay[UCPBA]",
			"Union Bank of the Philippines via InstaPay[UB]",
			"United Overseas Bank  12-Digits[UOB]",
			"University Savings Bank  15-Digits[USB]",
			"Veterans Bank 10-Digits[VB]",
			"Wealth Development Bank 12-Digits via InstaPay[WDB]",
        ]]);
    }
}
