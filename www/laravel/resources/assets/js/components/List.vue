<template lang="html">
  <div class="container">
    <div class="list-group">
      <router-link v-for="( item, key, index ) in items"
                   :key="key"
                   :to="{ name: 'detail', params: { id: item.id } }"
                   class="list-group-item">
        {{item.title}}
        <button class="btn" @click.stop.prevent="onDelete(item.id, key)">削除</button>
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      items: null
    }
  },
  mounted: function() {
    this.getItems();
  },
  methods: {
    getItems: function() {
      axios.get('/api/articles')
      .then( (res) => {
        this.items = res.data.data;
        console.log(this.items);
      });
    },
    onDelete: function(id, key) {
      axios.delete('/api/articles/' + id)
      .then( () => {
        this.$delete(this.items, key);
      })
    }
  }
}
</script>
