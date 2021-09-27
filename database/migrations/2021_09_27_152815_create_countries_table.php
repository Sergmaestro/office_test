<?php

use App\Models\Country;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('code', 4)->index();
            $table->string('name');
            $table->string('flag', 12)->nullable();
            $table->timestamps();
        });

        $now = \Carbon\Carbon::now();

        $countries = [
            [
                'code' => 'AF',
                'name' => 'Afghanistan',
                'flag' => '🇦🇫',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'AX',
                'name' => 'Aland Islands',
                'flag' => '🇦🇽',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'AL',
                'name' => 'Albania',
                'flag' => '🇦🇱',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'DZ',
                'name' => 'Algeria',
                'flag' => '🇩🇿',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'AS',
                'name' => 'American Samoa',
                'flag' => '🇦🇸',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'AD',
                'name' => 'Andorra',
                'flag' => '🇦🇩',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'AO',
                'name' => 'Angola',
                'flag' => '🇦🇴',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'AI',
                'name' => 'Anguilla',
                'flag' => '🇦🇮',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'AQ',
                'name' => 'Antarctica',
                'flag' => '🇦🇶',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'AG',
                'name' => 'Antigua And Barbuda',
                'flag' => '🇦🇬',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'AR',
                'name' => 'Argentina',
                'flag' => '🇦🇷',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'AM',
                'name' => 'Armenia',
                'flag' => '🇦🇲',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'AW',
                'name' => 'Aruba',
                'flag' => '🇦🇼',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'AU',
                'name' => 'Australia',
                'flag' => '🇦🇺',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'AT',
                'name' => 'Austria',
                'flag' => '🇦🇹',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'AZ',
                'name' => 'Azerbaijan',
                'flag' => '🇦🇿',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'BS',
                'name' => 'Bahamas',
                'flag' => '🇧🇸',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'BH',
                'name' => 'Bahrain',
                'flag' => '🇧🇭',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'BD',
                'name' => 'Bangladesh',
                'flag' => '🇧🇩',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'BB',
                'name' => 'Barbados',
                'flag' => '🇧🇧',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'BY',
                'name' => 'Belarus',
                'flag' => '🇧🇾',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'BE',
                'name' => 'Belgium',
                'flag' => '🇧🇪',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'BZ',
                'name' => 'Belize',
                'flag' => '🇧🇿',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'BJ',
                'name' => 'Benin',
                'flag' => '🇧🇯',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'BM',
                'name' => 'Bermuda',
                'flag' => '🇧🇲',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'BT',
                'name' => 'Bhutan',
                'flag' => '🇧🇹',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'BO',
                'name' => 'Bolivia',
                'flag' => '🇧🇴',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'BA',
                'name' => 'Bosnia And Herzegovina',
                'flag' => '🇧🇦',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'BW',
                'name' => 'Botswana',
                'flag' => '🇧🇼',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'BV',
                'name' => 'Bouvet Island',
                'flag' => '🇧🇻',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'BR',
                'name' => 'Brazil',
                'flag' => '🇧🇷',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'IO',
                'name' => 'British Indian Ocean Territory',
                'flag' => '🇮🇴',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'BN',
                'name' => 'Brunei Darussalam',
                'flag' => '🇧🇳',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'BG',
                'name' => 'Bulgaria',
                'flag' => '🇧🇬',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'BF',
                'name' => 'Burkina Faso',
                'flag' => '🇧🇫',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'BI',
                'name' => 'Burundi',
                'flag' => '🇧🇮',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'KH',
                'name' => 'Cambodia',
                'flag' => '🇰🇭',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'CM',
                'name' => 'Cameroon',
                'flag' => '🇨🇲',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'CA',
                'name' => 'Canada',
                'flag' => '🇨🇦',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'CV',
                'name' => 'Cape Verde',
                'flag' => '🇨🇻',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'BQ',
                'name' => 'Caribbean Netherlands',
                'flag' => '🇧🇶',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'KY',
                'name' => 'Cayman Islands',
                'flag' => '🇰🇾',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'CF',
                'name' => 'Central African Republic',
                'flag' => '🇨🇫',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'TD',
                'name' => 'Chad',
                'flag' => '🇹🇩',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'CL',
                'name' => 'Chile',
                'flag' => '🇨🇱',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'CN',
                'name' => 'China',
                'flag' => '🇨🇳',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'CX',
                'name' => 'Christmas Island',
                'flag' => '🇨🇽',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'CC',
                'name' => 'Cocos (Keeling) Islands',
                'flag' => '🇨🇨',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'CO',
                'name' => 'Colombia',
                'flag' => '🇨🇴',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'KM',
                'name' => 'Comoros',
                'flag' => '🇰🇲',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'CG',
                'name' => 'Congo',
                'flag' => '🇨🇬',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'CD',
                'name' => 'Congo, Democratic Republic',
                'flag' => '🇨🇩',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'CK',
                'name' => 'Cook Islands',
                'flag' => '🇨🇰',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'CR',
                'name' => 'Costa Rica',
                'flag' => '🇨🇷',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'CI',
                'name' => 'Cote D\'Ivoire',
                'flag' => '🇨🇮',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'HR',
                'name' => 'Croatia',
                'flag' => '🇭🇷',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'CU',
                'name' => 'Cuba',
                'flag' => '🇨🇺',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'CY',
                'name' => 'Cyprus',
                'flag' => '🇨🇾',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'CZ',
                'name' => 'Czech Republic',
                'flag' => '🇨🇿',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'DK',
                'name' => 'Denmark',
                'flag' => '🇩🇰',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'DJ',
                'name' => 'Djibouti',
                'flag' => '🇩🇯',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'DM',
                'name' => 'Dominica',
                'flag' => '🇩🇲',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'DO',
                'name' => 'Dominican Republic',
                'flag' => '🇩🇴',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'EC',
                'name' => 'Ecuador',
                'flag' => '🇪🇨',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'EG',
                'name' => 'Egypt',
                'flag' => '🇪🇬',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'SV',
                'name' => 'El Salvador',
                'flag' => '🇸🇻',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'GQ',
                'name' => 'Equatorial Guinea',
                'flag' => '🇬🇶',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'ER',
                'name' => 'Eritrea',
                'flag' => '🇪🇷',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'EE',
                'name' => 'Estonia',
                'flag' => '🇪🇪',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'ET',
                'name' => 'Ethiopia',
                'flag' => '🇪🇹',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'FK',
                'name' => 'Falkland Islands (Malvinas)',
                'flag' => '🇫🇰',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'FO',
                'name' => 'Faroe Islands',
                'flag' => '🇫🇴',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'FJ',
                'name' => 'Fiji',
                'flag' => '🇫🇯',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'FI',
                'name' => 'Finland',
                'flag' => '🇫🇮',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'FR',
                'name' => 'France',
                'flag' => '🇫🇷',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'GF',
                'name' => 'French Guiana',
                'flag' => '🇬🇫',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'PF',
                'name' => 'French Polynesia',
                'flag' => '🇵🇫',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'TF',
                'name' => 'French Southern Territories',
                'flag' => '🇹🇫',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'GA',
                'name' => 'Gabon',
                'flag' => '🇬🇦',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'GM',
                'name' => 'Gambia',
                'flag' => '🇬🇲',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'GE',
                'name' => 'Georgia',
                'flag' => '🇬🇪',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'DE',
                'name' => 'Germany',
                'flag' => '🇩🇪',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'GH',
                'name' => 'Ghana',
                'flag' => '🇬🇭',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'GI',
                'name' => 'Gibraltar',
                'flag' => '🇬🇮',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'GR',
                'name' => 'Greece',
                'flag' => '🇬🇷',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'GL',
                'name' => 'Greenland',
                'flag' => '🇬🇱',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'GD',
                'name' => 'Grenada',
                'flag' => '🇬🇩',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'GP',
                'name' => 'Guadeloupe',
                'flag' => '🇬🇵',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'GU',
                'name' => 'Guam',
                'flag' => '🇬🇺',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'GT',
                'name' => 'Guatemala',
                'flag' => '🇬🇹',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'GG',
                'name' => 'Guernsey',
                'flag' => '🇬🇬',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'GN',
                'name' => 'Guinea',
                'flag' => '🇬🇳',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'GW',
                'name' => 'Guinea-Bissau',
                'flag' => '🇬🇼',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'GY',
                'name' => 'Guyana',
                'flag' => '🇬🇾',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'HT',
                'name' => 'Haiti',
                'flag' => '🇭🇹',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'HM',
                'name' => 'Heard Island & Mcdonald Islands',
                'flag' => '🇭🇲',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'VA',
                'name' => 'Holy See (Vatican City State)',
                'flag' => '🇻🇦',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'HN',
                'name' => 'Honduras',
                'flag' => '🇭🇳',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'HK',
                'name' => 'Hong Kong',
                'flag' => '🇭🇰',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'HU',
                'name' => 'Hungary',
                'flag' => '🇭🇺',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'IS',
                'name' => 'Iceland',
                'flag' => '🇮🇸',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'IN',
                'name' => 'India',
                'flag' => '🇮🇳',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'ID',
                'name' => 'Indonesia',
                'flag' => '🇮🇩',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'IR',
                'name' => 'Iran, Islamic Republic Of',
                'flag' => '🇮🇷',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'IQ',
                'name' => 'Iraq',
                'flag' => '🇮🇶',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'IE',
                'name' => 'Ireland',
                'flag' => '🇮🇪',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'IM',
                'name' => 'Isle Of Man',
                'flag' => '🇮🇲',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'IL',
                'name' => 'Israel',
                'flag' => '🇮🇱',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'IT',
                'name' => 'Italy',
                'flag' => '🇮🇹',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'JM',
                'name' => 'Jamaica',
                'flag' => '🇯🇲',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'JP',
                'name' => 'Japan',
                'flag' => '🇯🇵',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'JE',
                'name' => 'Jersey',
                'flag' => '🇯🇪',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'JO',
                'name' => 'Jordan',
                'flag' => '🇯🇴',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'KZ',
                'name' => 'Kazakhstan',
                'flag' => '🇰🇿',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'KE',
                'name' => 'Kenya',
                'flag' => '🇰🇪',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'KI',
                'name' => 'Kiribati',
                'flag' => '🇰🇮',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'KR',
                'name' => 'Korea',
                'flag' => '🇰🇷',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'KW',
                'name' => 'Kuwait',
                'flag' => '🇰🇼',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'KG',
                'name' => 'Kyrgyzstan',
                'flag' => '🇰🇬',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'LA',
                'name' => 'Lao People\'s Democratic Republic',
                'flag' => '🇱🇦',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'LV',
                'name' => 'Latvia',
                'flag' => '🇱🇻',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'LB',
                'name' => 'Lebanon',
                'flag' => '🇱🇧',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'LS',
                'name' => 'Lesotho',
                'flag' => '🇱🇸',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'LR',
                'name' => 'Liberia',
                'flag' => '🇱🇷',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'LY',
                'name' => 'Libyan Arab Jamahiriya',
                'flag' => '🇱🇾',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'LI',
                'name' => 'Liechtenstein',
                'flag' => '🇱🇮',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'LT',
                'name' => 'Lithuania',
                'flag' => '🇱🇹',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'LU',
                'name' => 'Luxembourg',
                'flag' => '🇱🇺',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'MO',
                'name' => 'Macao',
                'flag' => '🇲🇴',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'MK',
                'name' => 'Macedonia',
                'flag' => '🇲🇰',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'MG',
                'name' => 'Madagascar',
                'flag' => '🇲🇬',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'MW',
                'name' => 'Malawi',
                'flag' => '🇲🇼',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'MY',
                'name' => 'Malaysia',
                'flag' => '🇲🇾',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'MV',
                'name' => 'Maldives',
                'flag' => '🇲🇻',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'ML',
                'name' => 'Mali',
                'flag' => '🇲🇱',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'MT',
                'name' => 'Malta',
                'flag' => '🇲🇹',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'MH',
                'name' => 'Marshall Islands',
                'flag' => '🇲🇭',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'MQ',
                'name' => 'Martinique',
                'flag' => '🇲🇶',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'MR',
                'name' => 'Mauritania',
                'flag' => '🇲🇷',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'MU',
                'name' => 'Mauritius',
                'flag' => '🇲🇺',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'YT',
                'name' => 'Mayotte',
                'flag' => '🇾🇹',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'MX',
                'name' => 'Mexico',
                'flag' => '🇲🇽',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'FM',
                'name' => 'Micronesia, Federated States Of',
                'flag' => '🇫🇲',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'MD',
                'name' => 'Moldova',
                'flag' => '🇲🇩',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'MC',
                'name' => 'Monaco',
                'flag' => '🇲🇨',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'MN',
                'name' => 'Mongolia',
                'flag' => '🇲🇳',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'ME',
                'name' => 'Montenegro',
                'flag' => '🇲🇪',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'MS',
                'name' => 'Montserrat',
                'flag' => '🇲🇸',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'MA',
                'name' => 'Morocco',
                'flag' => '🇲🇦',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'MZ',
                'name' => 'Mozambique',
                'flag' => '🇲🇿',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'MM',
                'name' => 'Myanmar',
                'flag' => '🇲🇲',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'NA',
                'name' => 'Namibia',
                'flag' => '🇳🇦',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'NR',
                'name' => 'Nauru',
                'flag' => '🇳🇷',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'NP',
                'name' => 'Nepal',
                'flag' => '🇳🇵',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'NL',
                'name' => 'Netherlands',
                'flag' => '🇳🇱',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'NC',
                'name' => 'New Caledonia',
                'flag' => '🇳🇨',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'NZ',
                'name' => 'New Zealand',
                'flag' => '🇳🇿',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'NI',
                'name' => 'Nicaragua',
                'flag' => '🇳🇮',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'NE',
                'name' => 'Niger',
                'flag' => '🇳🇪',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'NG',
                'name' => 'Nigeria',
                'flag' => '🇳🇬',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'NU',
                'name' => 'Niue',
                'flag' => '🇳🇺',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'NF',
                'name' => 'Norfolk Island',
                'flag' => '🇳🇫',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'MP',
                'name' => 'Northern Mariana Islands',
                'flag' => '🇲🇵',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'NO',
                'name' => 'Norway',
                'flag' => '🇳🇴',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'OM',
                'name' => 'Oman',
                'flag' => '🇴🇲',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'PK',
                'name' => 'Pakistan',
                'flag' => '🇵🇰',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'PW',
                'name' => 'Palau',
                'flag' => '🇵🇼',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'PS',
                'name' => 'Palestinian Territory, Occupied',
                'flag' => '🇵🇸',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'PA',
                'name' => 'Panama',
                'flag' => '🇵🇦',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'PG',
                'name' => 'Papua New Guinea',
                'flag' => '🇵🇬',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'PY',
                'name' => 'Paraguay',
                'flag' => '🇵🇾',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'PE',
                'name' => 'Peru',
                'flag' => '🇵🇪',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'PH',
                'name' => 'Philippines',
                'flag' => '🇵🇭',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'PN',
                'name' => 'Pitcairn',
                'flag' => '🇵🇳',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'PL',
                'name' => 'Poland',
                'flag' => '🇵🇱',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'PT',
                'name' => 'Portugal',
                'flag' => '🇵🇹',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'PR',
                'name' => 'Puerto Rico',
                'flag' => '🇵🇷',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'QA',
                'name' => 'Qatar',
                'flag' => '🇶🇦',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'RE',
                'name' => 'Reunion',
                'flag' => '🇷🇪',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'RO',
                'name' => 'Romania',
                'flag' => '🇷🇴',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'RU',
                'name' => 'Russian Federation',
                'flag' => '🇷🇺',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'RW',
                'name' => 'Rwanda',
                'flag' => '🇷🇼',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'BL',
                'name' => 'Saint Barthelemy',
                'flag' => '🇧🇱',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'SH',
                'name' => 'Saint Helena',
                'flag' => '🇸🇭',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'KN',
                'name' => 'Saint Kitts And Nevis',
                'flag' => '🇰🇳',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'LC',
                'name' => 'Saint Lucia',
                'flag' => '🇱🇨',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'MF',
                'name' => 'Saint Martin',
                'flag' => '🇲🇫',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'PM',
                'name' => 'Saint Pierre And Miquelon',
                'flag' => '🇵🇲',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'VC',
                'name' => 'Saint Vincent And Grenadines',
                'flag' => '🇻🇨',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'WS',
                'name' => 'Samoa',
                'flag' => '🇼🇸',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'SM',
                'name' => 'San Marino',
                'flag' => '🇸🇲',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'ST',
                'name' => 'Sao Tome And Principe',
                'flag' => '🇸🇹',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'SA',
                'name' => 'Saudi Arabia',
                'flag' => '🇸🇦',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'SN',
                'name' => 'Senegal',
                'flag' => '🇸🇳',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'RS',
                'name' => 'Serbia',
                'flag' => '🇷🇸',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'SC',
                'name' => 'Seychelles',
                'flag' => '🇸🇨',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'SL',
                'name' => 'Sierra Leone',
                'flag' => '🇸🇱',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'SG',
                'name' => 'Singapore',
                'flag' => '🇸🇬',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'SK',
                'name' => 'Slovakia',
                'flag' => '🇸🇰',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'SI',
                'name' => 'Slovenia',
                'flag' => '🇸🇮',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'SB',
                'name' => 'Solomon Islands',
                'flag' => '🇸🇧',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'SO',
                'name' => 'Somalia',
                'flag' => '🇸🇴',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'ZA',
                'name' => 'South Africa',
                'flag' => '🇿🇦',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'GS',
                'name' => 'South Georgia And Sandwich Isl.',
                'flag' => '🇬🇸',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'ES',
                'name' => 'Spain',
                'flag' => '🇪🇸',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'LK',
                'name' => 'Sri Lanka',
                'flag' => '🇱🇰',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'SD',
                'name' => 'Sudan',
                'flag' => '🇸🇩',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'SR',
                'name' => 'Suriname',
                'flag' => '🇸🇷',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'SJ',
                'name' => 'Svalbard And Jan Mayen',
                'flag' => '🇸🇯',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'SZ',
                'name' => 'Swaziland',
                'flag' => '🇸🇿',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'SE',
                'name' => 'Sweden',
                'flag' => '🇸🇪',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'CH',
                'name' => 'Switzerland',
                'flag' => '🇨🇭',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'SY',
                'name' => 'Syrian Arab Republic',
                'flag' => '🇸🇾',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'TW',
                'name' => 'Taiwan',
                'flag' => '🇹🇼',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'TJ',
                'name' => 'Tajikistan',
                'flag' => '🇹🇯',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'TZ',
                'name' => 'Tanzania',
                'flag' => '🇹🇿',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'TH',
                'name' => 'Thailand',
                'flag' => '🇹🇭',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'TL',
                'name' => 'Timor-Leste',
                'flag' => '🇹🇱',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'TG',
                'name' => 'Togo',
                'flag' => '🇹🇬',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'TK',
                'name' => 'Tokelau',
                'flag' => '🇹🇰',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'TO',
                'name' => 'Tonga',
                'flag' => '🇹🇴',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'TT',
                'name' => 'Trinidad And Tobago',
                'flag' => '🇹🇹',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'TN',
                'name' => 'Tunisia',
                'flag' => '🇹🇳',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'TR',
                'name' => 'Turkey',
                'flag' => '🇹🇷',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'TM',
                'name' => 'Turkmenistan',
                'flag' => '🇹🇲',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'TC',
                'name' => 'Turks And Caicos Islands',
                'flag' => '🇹🇨',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'TV',
                'name' => 'Tuvalu',
                'flag' => '🇹🇻',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'UG',
                'name' => 'Uganda',
                'flag' => '🇺🇬',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'UA',
                'name' => 'Ukraine',
                'flag' => '🇺🇦',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'AE',
                'name' => 'United Arab Emirates',
                'flag' => '🇦🇪',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'GB',
                'name' => 'United Kingdom',
                'flag' => '🇬🇧',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'US',
                'name' => 'United States',
                'flag' => '🇺🇸',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'UM',
                'name' => 'United States Outlying Islands',
                'flag' => '🇺🇲',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'UY',
                'name' => 'Uruguay',
                'flag' => '🇺🇾',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'UZ',
                'name' => 'Uzbekistan',
                'flag' => '🇺🇿',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'VU',
                'name' => 'Vanuatu',
                'flag' => '🇻🇺',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'VE',
                'name' => 'Venezuela',
                'flag' => '🇻🇪',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'VN',
                'name' => 'Viet Nam',
                'flag' => '🇻🇳',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'VG',
                'name' => 'Virgin Islands, British',
                'flag' => '🇻🇬',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'VI',
                'name' => 'Virgin Islands, U.S.',
                'flag' => '🇻🇮',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'WF',
                'name' => 'Wallis And Futuna',
                'flag' => '🇼🇫',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'EH',
                'name' => 'Western Sahara',
                'flag' => '🇪🇭',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'YE',
                'name' => 'Yemen',
                'flag' => '🇾🇪',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'ZM',
                'name' => 'Zambia',
                'flag' => '🇿🇲',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'ZW',
                'name' => 'Zimbabwe',
                'flag' => '🇿🇼',
                'created_at' => $now,
                'updated_at' => $now
            ]
        ];

        Country::insert($countries);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
