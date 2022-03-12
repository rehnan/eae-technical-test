<template>
    <div class="eae-tag">
        <span class="eae-tag-label" v-bind:class="{ 'black-theme': !!blackTheme }">{{ value }}</span>
    </div>
</template>

<script>
export default {
    name: 'EaeTag',
    props: {
      value: String,
      blackTheme: Boolean
    }
}
</script>

<style scoped>
    div.eae-tag {
        color: white;
        font-weight: 600;
        margin-left: 5px;
        white-space: nowrap;
        font-size: 12px;
        text-transform: uppercase;
    }

    div.eae-tag span.eae-tag-label {
        background-color: hsl(181deg 27% 52%);
        line-height: 11px;
        border-radius: 10px;
        font-size: 8px;
        padding: 5px 10px 4px 10px;
    }

    div.eae-tag span.eae-tag-label.black-theme {
        background: black;
        color: white;
    }
</style>
