namespace Database\Seeders;

use App\Models\URL;
use App\Models\User;
use Illuminate\Database\Seeder;

class UrlSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(5)->create()->each(function ($user) {
            $user->urls()->saveMany(URL::factory()->count(3)->make());
        });
    }
}
