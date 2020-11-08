# Test task for Supermetrics

Author: Andrey Tushev

Email: andrey.tushev@gmail.com


## Usage

`./index.php` - Console entry point

`phpunit tests` - Run tests (here is no full coverage yet)


## Classes

`Config` - Configuration parameters

`ApiException, NetworkException` - Specific project exceptions

`Network` - Simple HTTP client

`Api` - API calls to the server

`Post, PostsCollection` - Data containers for posts

`PostsSourceInterface, PostsSourceApi, PostsSourceTest` - Posts sources (Interfaces and its implementations)

`Stat` - Staistics calculator


## Output example
```json
{
    "avg_per_user_per_month": {
        "user_5": {
            "11": 40,
            "10": 50
        },
        
        ...
        
        "user_11": {
            "11": 20,
            "10": 50
        },
        "user_3": {
            "11": 10,
            "10": 60
        },
        "user_9": {
            "10": 10
        }
    },
    "avg_per_month": {
        "11": 412.9,
        "10": 380.85
    },
    "posts_by_weeks": {
        "45": 350,
        "44": 390,
        "43": 260
    },
    "longest_per_month": {
        "11": 751,
        "10": 786
    }
}
```
