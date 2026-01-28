<script setup>
import { useDark, useToggle } from '@vueuse/core'
import { Button } from '@/components/ui/button'
import { Moon, Sun } from 'lucide-vue-next'

const isDark = useDark() // Gestisce automaticamente il salvataggio in LocalStorage
const toggleDark = useToggle(isDark)
</script>

<template>
  <Button variant="ghost" size="icon" @click="toggleDark()">
    <Sun v-if="isDark" class="h-5 w-5 transition-all" />
    <Moon v-else class="h-5 w-5 transition-all" />
    <span class="sr-only">Cambia tema</span>
  </Button>
</template>