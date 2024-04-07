window._ = require('lodash');

new Vue({
    el: '#tweet',
    data: {
        userAction: {
            like: {
                list: [],
                debouncedList: []
            },
        },
    },
    methods: {
        pushLike(tweet) {
            if (this.userAction.like.list.indexOf(tweet.id) == -1) {
                this.userAction.like.list.push(tweet.id);
                this.newPostLike(tweet.id);
            }
            this.userAction.like.debouncedList[tweet.id](tweet.id, !tweet.is_liked);
            tweet.is_liked = !tweet.is_liked;
        },

        newPostLike(tweetId) {
            this.userAction.like.debouncedList[tweetId] = _.debounce(this.postLike, 1000);
        },

        postLike(tweetId, likePushed) {
            axios.post(window.location.origin + `/tweet/like`, {
                tweetId: tweetId,
                likePushed: likePushed
            })
                .then(response => {
                    console.log(response);
                })
                .catch(error => {
                    console.log(error);
                });
        },
    },
});
