<template>
  <div class="">
    <h1 class="text-xxl text-[#2b6b88]">Bienvenu dans evenement</h1>
    <!-- Button trigger modal -->
    <!-- scroll area -->
    <section class="overflow-auto p-8 w-full h-full flex flex-col">
      <header class="border-dashed border-2 border-gray-400 py-12 flex flex-col justify-center items-center">
        <div>
          <input type="file" id="fileInput" @change="handleFileUpload" multiple hidden />
          <label for="fileInput">Select files</label>
          <ul v-if="selectedFiles.length > 0">
            <li v-for="(data, index) in selectedFiles" :key="index">
              {{ data.file.size }} bytes
              <img :src="data.imageUrl" :alt="data.file.name" class="w-32 h-32 object-cover">
            </li>
          </ul>
        </div>
      </header>
    </section>

  </div>
</template>

<script>

export default {
  name: 'Evenement',
  components: {

  },
  data() {
    return {
      selectedFiles: [],
    }
  },
  methods: {
   
  },

}
</script>
