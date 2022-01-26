## RSS Importer

This is my approach to solve a request to have podcasts rss urls and parse the xml into a database.

I used <a href="https://github.com/docker-php/docker-php">docker-php</a> project as a base to met the requirement for the test

<h3>Versions</h3>
<ul>
  <li>Docker desktop ver 4.3.0</li>
  <li>Compose ver 1.29.2</li>
  <li>PHP ver 8.1.0</li>
  <li>MySQL ver 8.0.27</li>
  <li>nginx ver 1.21.4</li>
  <li>Laravel 8</li>
</ul>

<h3>Tools used</h3>
<ul>
    <li>VS Code</li>
    <li>Chrome Browser</li>
    <li>Macbook Pro with Catalina OS</li>
</ul>

## Install

Get the code

<code>git clone https://github.com/xalfeiran/rss-importer.git</code>

Run Laravel sail

<code>./vendor/bin/sail up</code>

Setup Database settings in .env file

Run migrations

<code>php artisan migrate</code>

## Use

The project is made to be called by artisan command (but prepared to adapt the controllers to be called from a api 

Sample calls

To test if the provided url returns a valid podcast xml<br/>
<code>php artisan command:test-podcast-url https://nosleeppodcast.libsyn.com/rss</code>

To test if the provided url returns a list of episodes<br/>
<code>php artisan command:test-podcast-episodes-url https://nosleeppodcast.libsyn.com/rss</code>

Run the actual import<br/>
<code>php artisan command:import-podcast-to-library https://feeds.megaphone.fm/stuffyoushouldknow</code>
Sample output
<code>Podcast information loaded
Took 10 seconds</code>

## What's next

Other than calling this process by command line, it may be needed to make a call using a api to the sample code provides a good start

create a route in the api.php file<br/>
<code>Route::post('/podcasts/create', 'App\Http\Controllers\PodcastsController@createFromRequest');</code>

Review the PodcastController on the createFromRequest method<br/>
<code>
    // sample method to call the podcast creation from a request
    public function createFromRequest(Request $request)
    {
        // get the podcast information
        $podcast_url = $request->podcast_url;
        // call the podcast creation
        $podcast = $this->create($podcast_url);

        // return a json response
        return response()->json($podcast);
    }
</code>

Make a call from let's say Postman to: <code>http://localhost/api/podcasts/create</code>





## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
