<?php

namespace Extractora\clases;

use Carbon\Carbon;

class fecha 
{

	public static function getTimeNowEspanol(){
		$fecha = Carbon::now();
		setlocale(LC_TIME, 'Spanish');
		$dt = Carbon::parse($fecha);
		Carbon::setUtf8(true);
		return $dt->formatLocalized('%A %d %B %Y').' a las '.$fecha->toTimeString();
	}

	public static function getTimeNowNormal(){		
		return Carbon::now();
	}
	public static function getTimeNowConHora(){		
		return Carbon::now()->format('d/m/Y H:i:s');
	}

}