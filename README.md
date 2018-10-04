# simple-stopwatch
A simple Stopwatch utility for PHP

### Usage
#### Start the Stopwatch
`$start = StopWatch::start();`

#### Default Output
    $start = StopWatch::start();
    sleep(3); // Sleep 3 seconds for testing
    $end = Stopwatch::stop($start);
    echo 'Elapsed: '.$end; //Elapsed: 0 hours, 0 minutes and 3 seconds

#### Specify Output format
    $start = StopWatch::start();
    sleep(3); // Sleep 3 seconds for testing
    $end = Stopwatch::stop($start, true, 's');
    echo 'Elapsed Seconds: '.$end; //Elapsed Seconds: 3

#### Get current timestamp including microseconds
    $current = StopWatch::current();
    echo $current; //2018-10-04 10:37:30.271700