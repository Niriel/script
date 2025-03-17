import { computed, ref } from "vue";
const axios = require('axios').default;

const books = ref([]);

const fetchBooks = async () => {
    const {data} = await axios.get('api/books');
    if (!data) return;
    books.value = data;
}

const getAllBooks = computed(() => books.value);
