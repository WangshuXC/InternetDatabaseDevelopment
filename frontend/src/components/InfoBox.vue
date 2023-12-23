<template>
  <article class="movie-card">
    <img :src="src" alt="Avatar wallpaper" />

    <div class="cardContent">
      <h1>{{ title }}</h1>

      <div class="infos">
        <span>·&nbsp;&nbsp;{{ time }}</span>
      </div>

      <p class="synopsis">
        {{ synopsis }}
      </p>
    </div>
  </article>
</template>

<script>
export default {
  props: {
    src: {
      type: String,
      required: true
    },
    title: {
      type: String,
      required: true
    },
    synopsis: {
      type: String,
      required: true
    },
    time: {
      type: String,
      required: true
    }
  },
  mounted() {
    console.log(this.title)
  }
}
</script>

<style>
.movie-card {
  --transition-duration: 700ms;
  color: white;
  position: relative;
  border-radius: 0.6em;
  overflow: hidden;
  font-size: 100%;
  height: min(15em, 25vh);
  max-width: 90vw;
  aspect-ratio: 16/9;
  box-shadow: var(--shadow-lg), var(--shadow-lg), var(--shadow-lg);
  transition: transform var(--transition-duration);

  &::after {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 80% -150%, transparent 60%, rgba(0, 0, 0, 0.5));
    transition: box-shadow var(--transition-duration);
    mix-blend-mode: overlay;
  }
}

img {
  height: 100%;
  width: 100%;
  transition: transform var(--transition-duration);
  object-fit: cover;
  object-position: center;
}

.cardContent {
  z-index: 1;
  position: absolute;
  bottom: min(0.5em, 5vmin);
  left: min(2em, 8vmin);
  right: min(3em, 8vmin);
  text-align: left;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
  transition: transform var(--transition-duration) var(--ease-in-out);

  >* {
    position: relative;
    will-change: transform;
  }
}

h1 {
  font-size: 1.6em;
  color: inherit;
  margin: 0;
}

.infos {
  font-size: 0.8em;
  font-weight: bold;
  color: #eee;
  display: flex;
  gap: 0.35em;
  align-items: flex-end;

  span {
    line-height: 2;
  }
}

.synopsis {
  font-size: 1em;
  line-height: 1.2;
  margin-block: 1.75em;
  padding: 10px;
  border-radius: 15px;
  transition-delay: calc(var(--transition-duration) / 8);
  transition-property: opacity, transform;
  transition-duration: calc(var(--transition-duration) / 2);
}

.movie-card:hover {
  transform: scale(1.1);

  img {
    transform: scale(1.1);
  }

  .synopsis {
    transition-duration: var(--transition-duration);
    transition-delay: calc(var(--transition-duration) / 3);
  }
}

.movie-card:not(:hover) {
  .synopsis {
    opacity: 0;
    transform: translateY(0.5em);
  }

  .cardContent {
    transform: translateY(calc(100% - 4.5em));
  }
}
</style>
