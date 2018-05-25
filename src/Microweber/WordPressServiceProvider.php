//app/Providers/WordPressServiceProvider.php

class WordPressServiceProvider extends ServiceProvider {

	protected $bootstrapFilePath = '../../wp-load.php' ;
	
	public function boot () {
			// Load assets
			wp_enque_style('app' , '/app/public/app.css');
			}
			
	public function register () {
			// Load wordpress bootstrap file
			if (File::exists($this ->bootstrapFilePath))  {
				require once $this->bootstrapFilePath;
				} else throw new \RuntimeException ('Wordpress bootstrap file not found!)
			}	

}					