<?php


namespace TestCMS\Models;


use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class CnobistestTest extends Model
{
    use Translatable;
    protected $table = 'cnobistest_test';
    public $translationModel = 'TestCMS\Models\CnobistestTestTranslations';
    public $translatedAttributes = [
        'title', 'desc', 'locale','defic'
    ];
    protected $fillable = [
        'uuid','row','gamosacnobi','dasamaxsovrebeli','time','timetest','proc'
    ];
    public function cnobistest($uuid)
    {
//        dump($uuid);
        return $this->belongsToMany(CnobistestTest::class, 'cnobistest_test_to_any', 'empti', 'cnobistest_test', 'uuid', 'uuid')
            ->withPivot('row_uuid','cnobistest_test')->where('cnobistest_test', '=', $uuid);
    }
    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        self::creating(function ($model) {
            $model->uuid = Uuid::uuid4();
        });
    }
}
