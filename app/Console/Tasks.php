<?php

namespace App\Console;

use App\Model\Donation;
use App\Model\Transfer;

class Tasks
{
	public function __invoke()
	{
		$this->update_donations_status();
		$this->delete_expired_transfers();
	}

	public function update_donations_status()
	{
		Donation::where('status', 1)->chunkById(100, function($donations)
		{
			foreach ($donations as $id => $donation) {

				$check_limit = now() > $donation->limit;
				$check_target = $donation->transfers()->sum('amount') > $donation->target;

				if ( $check_limit || $check_target ) {
					Donation::find($donation->id)->update(['status' => 0]);
				}
			}
		});
	}

	public function delete_expired_transfers()
	{
		Transfer::withTrashed()->where('status', 0)->chunkById(100, function($transfers)
		{
			foreach ($transfers as $transfer) {
				
				$check_proof = is_null($transfer->proof);
				$check_day = now() > $transfer->created_at->addDays(2);

				if ($check_proof && $check_day) {
					Transfer::withTrashed()->find($transfer->id)->forceDelete();
				}

			}
		});
	}
}