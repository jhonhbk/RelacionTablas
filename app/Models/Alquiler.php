<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Alquiler extends Model
{
    use HasFactory;

    protected $table = 'alquileres';
 
    protected $fillable = ['monto', 'fecha_inicio', 'fecha_fin'];
 
    public function inquilino_alquiler()
    {
        return $this->belongsTo(Inquilino_Alquiler::class);
    }

    public function inquilino()
    {
        return $this->belongsTo(Inquilino::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

 
 
}