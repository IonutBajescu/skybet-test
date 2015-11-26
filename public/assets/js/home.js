

// Being an angular guy, that's the first time I use Vue.js, yay!

var vue = new Vue({
    el: '#app',
    data: {
        people: [],
        saved: false,
        saving: false
    },
    methods: {
        fetchPeople: function () {
            var vue = this;
            $.getJSON('app.php', {action: 'people'}, function(people) {
                vue.people = people;
            });
        },
        submitPeople: function() {
            vue.saving = true;
            $.post('app.php?action=people', {people: this.people}, function() {
                vue.saving = false;
                vue.saved = true;
            })
        }
    }
});

vue.fetchPeople();
