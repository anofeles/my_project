<?php


namespace TestCMS\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class StrupEfeqtTest extends Model
{
    use Translatable;
    protected $table = 'strup_efeqt_test';
    public $translationModel = 'TestCMS\Models\StrupEfeqtTestTranslations';
    protected $fillable = [
      'uuid','raodenoba','swori','neitraluri','timetest','fulltimetest','proc'
    ];
    public $translatedAttributes = [
        'title', 'desc', 'locale','defic'
    ];

    public function spruttoani($uuid)
    {
//        dd($uuid);
        return $this->belongsToMany(StrupEfeqtTest::class, 'strup_efeqt_test_to_any', 'empti', 'row_uuid', 'uuid', 'uuid')
            ->withPivot('row_uuid','strup_efeqt_test_uuid')->where('row_uuid', '=', $uuid);
    }

    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        self::creating(function ($model) {
            $model->uuid = Uuid::uuid4();
        });
    }
}
