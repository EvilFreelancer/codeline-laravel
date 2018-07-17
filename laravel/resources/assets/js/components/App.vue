<template>
    <div id="app">
        <div class="row">
            <films-component
                    v-for="film in films"
                    v-bind="film"
                    :key="film.id"
                    @update="update"
                    @delete="del"
            ></films-component>
        </div>
    </div>
</template>
<script>
    function Films({id, name, description, release_date, rating, ticket_price, country, genres, photo}) {
        this.id = id;
        this.name = name;
        this.description = description;
        this.release_date = release_date;
        this.rating = rating;
        this.ticket_price = ticket_price;
        this.country = country;
        this.genres = genres;
        this.photo = photo;
    }

    import FilmsComponent from './FilmsComponent.vue';

    export default {
        data() {
            return {
                films: [],
                mute: false
            }
        },
        watch: {
            mute(val) {
                document.getElementById('mute').className = val ? "on" : "";
            }
        },
        methods: {
            create(name, description, release_date, rating, ticket_price, country, genres, photo) {
                this.mute = true;
                let about = {
                    "name": name,
                    "description": description,
                    "release_date": release_date,
                    "rating": rating,
                    "ticket_price": ticket_price,
                    "country": country,
                    "genres": genres,
                    "photo": photo
                };
                window.axios.post(`/api/films`, about).then(() => {
                    this.films.push(new Films(about));
                    this.mute = false;
                });
            },
            read() {
                this.mute = true;
                window.axios.get('/api/films').then(({data}) => {
                    data.forEach(film => {
                        this.films.push(new Films(film));
                    });
                    this.mute = false;
                });
            },
            update(id, color) {
                this.mute = true;
                window.axios.put(`/api/films/${id}`, {color}).then(() => {
                    this.films.find(film => film.id === id).color = color;
                    this.mute = false;
                });
            },
            del(id) {
                this.mute = true;
                window.axios.delete(`/api/films/${id}`).then(() => {
                    let index = this.films.findIndex(crud => crud.id === id);
                    this.films.splice(index, 1);
                    this.mute = false;
                });
            }
        },
        components: {
            FilmsComponent
        },
        created() {
            this.read();
        }
    }
</script>
