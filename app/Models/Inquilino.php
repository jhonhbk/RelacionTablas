<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Inquilino extends Model
{
    use HasFactory;
 
    protected $fillable = ['nombre', 'correo_electronico'];
 
    public function inquilino_alquiler()
    {
        return $this->belongsTo(Inquilino_Alquiler::class);
    }
 
    public function inquilino_servicios()
    {
        return $this->hasOne(Inquilino_Servicios::class);
    }
 
    public function rentas()
    {
        return $this->hasMany(Rentas::class);
    }
 
    
}