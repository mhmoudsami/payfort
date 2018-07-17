<?php 
namespace Payfort\Helpers;

/**
 * statsues
 */
class Statuses
{
	/**
	 * get single item
	 */
	public static function get($code)
	{
		return self::all()[$code];
	}

	
	/**
	 * get all statuses
	 */
	public static function all()
	{
		return [
			'00' => 'Invalid Request.',
			'01' => 'Order Stored.',
			'02' => 'Authorization Success.',
			'03' => 'Authorization Failed.',
			'04' => 'Capture Success.',
			'05' => 'Capture failed.',
			'06' => 'Refund Success.',
			'07' => 'Refund Failed.',
			'08' => 'Authorization Voided Successfully.',
			'09' => 'Authorization Void Failed.',
			'10' => 'Incomplete.',
			'11' => 'Check status Failed.',
			'12' => 'Check status success.',
			'13' => 'Purchase Failure.',
			'14' => 'Purchase Success.',
			'15' => 'Uncertain Transaction.',
			'17' => 'Tokenization failed.',
			'18' => 'Tokenization success.',
			'19' => 'Transaction pending.',
			'20' => 'On hold.',
			'21' => 'SDK Token creation failure.',
			'22' => 'SDK Token creation success.',
			'23' => 'Failed to process Digital Wallet service.',
			'24' => 'Digital wallet order processed successfully.',
			'27' => 'Check card balance failed.',
			'28' => 'Check card balance success.',
			'29' => 'Redemption failed.',
			'30' => 'Redemption success.',
			'31' => 'Reverse Redemption transaction failed.',
			'32' => 'Reverse Redemption transaction success.',
			'40' => 'Transaction In review.',
			'42' => 'Currency conversion success.',
			'43' => 'Currency conversion failed.',
			'46' => 'Bill creation success.',
			'47' => 'Bill creation failed.',
			'48' => 'Generating invoice payment link success.',
			'49' => 'Generating invoice payment link failed.',
			'50' => 'Batch file upload successfully.',
			'51' => 'Upload batch file failed.',
			'52' => 'Token created successfully.',
			'53' => 'Token creation failed.',
			'54' => 'Get Tokens Success.',
			'55' => 'Get Tokens Failed.',
			'56' => 'Reporting Request Success.',
			'57' => 'Reporting Request Failed.',
			'58' => 'Token updated successfully.',
			'59' => 'Token updated failed.',
			'62' => 'Get Installment Plans Successfully.',
			'63' => 'Get Installment plans Failed.',
			'70' => 'Get batch results successfully.',
			'71' => 'Get batch results failed.',
			'72' => 'Batch processing success.',
			'73' => 'Batch processing failed.',
			'74' => 'Bank transfer failed.',
			'75' => 'Bank transfer successfully.',
			'76' => 'Batch validation successfully.',
			'77' => 'Batch validation failed.',
		];
	}
}