<template>
  <div class="">
    <h1 class="text-xxl text-[#2b6b88]">Bienvenu dans evenement</h1>
    <!-- Button trigger modal -->
    <!-- scroll area -->

    <div class="container flex items-center flex-col justify-center">
      <div class="w-[60%]">
        <div class="bg-blue-0 px-3 pt-3 rounded-xl shadow-sm">
          <div class="flex w-full">
            <img
              :src="require('@/assets/image/pdpNone.jpeg')"
              class="h-12 w-12 mx-2 object-cover cursor-pointer rounded-full"
              alt="photo de profile"
            />
            <demande-maintenance
              :getAllReparations="getAllReparations"
            ></demande-maintenance>
            <div
              class="mx-1 px-3 my-1 flex items-center text-sm text-blue-0 bg-blue-1 hover:bg-slate-50 hover:text-blue-1 rounded transition-all cursor-pointer"
            >
              <span class="mx-1"
                ><i class="fa-regular fa-calendar-days"></i
              ></span>
              <span class="mx-1 font-light"> Filtres </span>
            </div>
          </div>
          <div
            class="my-3 bg-gradient-to-r from-blue-500 to-blue-700 h-px"
          ></div>
          <div class="flex items-center">
            <div
              class="mx-1 px-4 py-2 flex items-center justify-center text-blue-2 border-b-4 border-blue-2 transition-all cursor-pointer w-1/2"
            >
              <span class="mx-2"
                ><i class="fa-solid fa-calendar-days"></i
              ></span>
              <span class="mx-2 font-bold"> Vue Liste </span>
            </div>
            <div
              class="mx-1 px-4 py-2 flex items-center justify-center text-blue-1 hover:text-blue-1 hover:bg-slate-50 rounded transition-all cursor-pointer w-1/2"
            >
              <span class="mx-2"
                ><i class="fa-solid fa-calendar-days"></i
              ></span>
              <span class="mx-2 font-bold"> Vue Grille </span>
            </div>
          </div>
        </div>
        <div class="my-2" v-if="dataArray == ''">
          <div class="h-full p-2 text-center">
            <span class="font-semibold text-lg text-blue-2"
              >Aucune demande effectué</span
            >
          </div>
        </div>
      </div>
      <!-- right contenu -->
      <liste-reparer
        class="my-3"
        :dataArray="dataArray"
        v-if="dataArray != ''"
      ></liste-reparer>
    </div>

    <!-- //////////// -->
    <div class="container flex items-center flex-col justify-center">
      <div class="m-8 grid gap-3 grid-cols-2 w-[60%] bg-white p-4 rounded-xl">
        <!-- nos card -->
        <div class="bg-white rounded-xl overflow-hidden shadow-md">
          <div class="h-60">
            <img
              class="w-full h-full"
              src="../../assets/event_img/chatgpt.png"
              alt=""
            />
          </div>
          <div class="mx-3">
            <span>mer., 22 avr. 2024, 19:00.</span> <br />
            <span class="text-xl">Formation IA.</span>
          </div>
          <div class="flex justify-between items-center px-4 py-3">
            <div class="text-center text-blue-500">
              <span
                class="border hover:bg-blue-500 hover:text-white cursor-pointer px- py-2 rounded-2xl"
                >Voir details</span
              >
            </div>
            <div
              class="rounded-full border hover:bg-blue-500 hover:text-white cursor-pointer text-center p-2 text-blue-500"
            >
              <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                <g>
                  <path
                    d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z"
                  ></path>
                </g>
              </svg>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-xl overflow-hidden shadow-md">
          <div class="h-60">
            <img
              class="w-full h-full"
              src="../../assets/event_img/chatgpt.png"
              alt=""
            />
          </div>
          <div class="mx-3">
            <span>mer., 22 avr. 2024, 19:00.</span> <br />
            <span class="text-xl">Formation IA.</span>
          </div>
          <div class="flex justify-between items-center px-4 py-3">
            <div class="text-center text-blue-500">
              <span
                class="border hover:bg-blue-500 hover:text-white cursor-pointer px-20 py-2 rounded-2xl"
                >Voir details</span
              >
            </div>
            <div
              class="rounded-full border hover:bg-blue-500 hover:text-white cursor-pointer text-center p-2 text-blue-500"
            >
              <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                <g>
                  <path
                    d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z"
                  ></path>
                </g>
              </svg>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-xl overflow-hidden shadow-md">
          <div class="h-60">
            <img
              class="w-full h-full"
              src="../../assets/event_img/chatgpt.png"
              alt=""
            />
          </div>
          <div class="mx-3">
            <span>mer., 22 avr. 2024, 19:00.</span> <br />
            <span class="text-xl">Formation IA.</span>
          </div>
          <div class="flex justify-between items-center px-4 py-3">
            <div class="text-center text-blue-500">
              <span
                class="border hover:bg-blue-500 hover:text-white cursor-pointer px-20 py-2 rounded-2xl"
                >Voir details</span
              >
            </div>
            <div
              class="rounded-full border hover:bg-blue-500 hover:text-white cursor-pointer text-center p-2 text-blue-500"
            >
              <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                <g>
                  <path
                    d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z"
                  ></path>
                </g>
              </svg>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-xl overflow-hidden shadow-md">
          <div class="h-60">
            <img
              class="w-full h-full"
              src="../../assets/event_img/chatgpt.png"
              alt=""
            />
          </div>
          <div class="mx-3">
            <span>mer., 22 avr. 2024, 19:00.</span> <br />
            <span class="text-xl">Formation IA.</span>
          </div>
          <div class="flex justify-between items-center px-4 py-3">
            <div class="text-center text-blue-500">
              <span
                class="border hover:bg-blue-500 hover:text-white cursor-pointer px-20 py-2 rounded-2xl"
                >Voir details</span
              >
            </div>
            <div
              class="rounded-full border hover:bg-blue-500 hover:text-white cursor-pointer text-center p-2 text-blue-500"
            >
              <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                <g>
                  <path
                    d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z"
                  ></path>
                </g>
              </svg>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-xl overflow-hidden shadow-md">
          <div class="h-60">
            <img
              class="w-full h-full"
              src="../../assets/event_img/chatgpt.png"
              alt=""
            />
          </div>
          <div class="mx-3">
            <span>mer., 22 avr. 2024, 19:00.</span> <br />
            <span class="text-xl">Formation IA.</span>
          </div>
          <div class="flex justify-between items-center px-4 py-3">
            <div class="text-center text-blue-500">
              <span
                class="border hover:bg-blue-500 hover:text-white cursor-pointer px-20 py-2 rounded-2xl"
                >Voir details</span
              >
            </div>
            <div
              class="rounded-full border hover:bg-blue-500 hover:text-white cursor-pointer text-center p-2 text-blue-500"
            >
              <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                <g>
                  <path
                    d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z"
                  ></path>
                </g>
              </svg>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-xl overflow-hidden shadow-md">
          <div class="h-60">
            <img
              class="w-full h-full"
              src="../../assets/event_img/chatgpt.png"
              alt=""
            />
          </div>
          <div class="mx-3">
            <span>mer., 22 avr. 2024, 19:00.</span> <br />
            <span class="text-xl">Formation IA.</span>
          </div>
          <div class="flex justify-between items-center px-4 py-3">
            <div class="text-center text-blue-500">
              <span
                class="border hover:bg-blue-500 hover:text-white cursor-pointer px-20 py-2 rounded-2xl"
                >Voir details</span
              >
            </div>
            <div
              class="rounded-full border hover:bg-blue-500 hover:text-white cursor-pointer text-center p-2 text-blue-500"
            >
              <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                <g>
                  <path
                    d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z"
                  ></path>
                </g>
              </svg>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- component -->
    <section class="overflow-auto p-8 w-full h-full flex flex-col">
      <header
        class="border-dashed border-2 border-gray-400 py-12 flex flex-col justify-center items-center"
      >
        <div>
          <input
            type="file"
            id="fileInput"
            @change="handleFileUpload"
            multiple
            hidden
          />
          <label for="fileInput">Select files</label>
          <ul v-if="selectedFiles.lerength > 0">
            <li v-for="(data, index) in selectedFiles" :key="index">
              {{ data.file.size }} bytes
              <img
                :src="data.imageUrl"
                :alt="data.file.name"
                class="w-32 h-32 object-cover"
              />
            </li>
          </ul>
        </div>
      </header>
    </section>
  </div>
</template>

<script>
export default {
  name: "Evenement",
  components: {},
  data() {
    return {
      selectedFiles: [],
    };
  },
  methods: {},
};
</script>
