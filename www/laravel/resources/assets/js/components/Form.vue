<template lang="html">
  <div class="container">
    <div v-if="saved" class="alert alert-primary" role="alert">
      保存しました
    </div>
    <form>
      <div class="form-group">
        <label for="ArticleTitle">
          タイトル
        </label>
        <input type="text" class="form-control" id="ArticleTitle" v-model="title">
      </div>
      <div class="form-group">
        <label for="ArticleContent">内容</label>
        <textarea class="form-control" id="ArticleContent" rows="3" v-model="content"></textarea>
      </div>
      <button type="submit" class="btn btn-primary" @click.prevent="create">登録</button>
    </form>
  </div>
</template>

<script>
  export default {
    data: function() {
      return {
        saved: false,
        title:'',
        content: '',
      }
    },
    methods: {
      create: function() {
        console.log(this.title);
        axios.post('/api/articles', {
          title: this.title,
          content: this.content,
        })
        .then((res) => {
          this.title = '';
          this.content = '';
          this.saved = true;
          console.log('created');
        })
      }
    }
  }
</script>
