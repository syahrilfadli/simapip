<script>
import { defineComponent, onMounted, ref } from 'vue'

export default defineComponent({
    name: 'PenugasanPage',
    components: {
    },
    setup(props, context) {
        const activeTab = ref(0)
        const showBooks = ref(false)
        return {
            activeTab,
            showBooks
        }
    }
})
</script>

<template>
    <section>
        <b-tabs v-model="activeTab">
            <b-tab-item label="Objek">
                <b-field>
                    <b-select
                        placeholder="Pilih nama objek"
                        size="is-large"
                        expanded>
                        <option value="flint">Flint</option>
                        <option value="silver">Silver</option>
                    </b-select>
                </b-field>
            </b-tab-item>

            <b-tab-item label="Penugasan">
            </b-tab-item>
        </b-tabs>
    </section>
</template>
