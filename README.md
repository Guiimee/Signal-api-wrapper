# Signal Rest Api PHP wrapper

This is a php wrapper for the signal rest api made by [@bbernard](https://github.com/bbernhard).

To use it, you need to create a docker for the rest api. The instructions can be seen [here](https://github.com/bbernhard/signal-cli-rest-api).

Once you have a docker running, you will need  its link to create the signal object.
SignalObjects initates every modules at the same time with the same base url, but those modules
can also be individually initialized.

### Exemple of how to use the wrapper
```
$base_url = 'http://localhost:8080';

$signal = new SignalObjects($base_url);

$signal->messages->send_message($user_number, [$recipient1_number], "Test Api!");
```

To use a user number, you need to first link the docker to a Signal account (or register an account with the docker as its main device).
