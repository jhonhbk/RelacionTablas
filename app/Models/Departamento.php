<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamentos';
 
    protected $fillable = ['direccion', 'renta', 'propietario_id'];
 
    
 
    public function renta()
    {
        return $this->hasOne(Renta::class);
    }
 
}