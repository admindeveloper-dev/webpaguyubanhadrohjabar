namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['hadroh_group_id', 'nama_pemesan', 'daerah', 'acara', 'waktu'];

    // Relasi: Orderan ini milik grup hadroh mana
    public function hadrohGroup()
    {
        return $this->belongsTo(HadrohGroup::class);
    }
}