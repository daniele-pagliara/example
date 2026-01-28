<script setup>
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card'
// Se hai installato lucide-vue-next
import { Database, Activity, Users, AlertCircle } from 'lucide-vue-next'
</script>

<template>
  <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
    <Card>
      <CardHeader class="flex flex-row items-center justify-between pb-2 space-y-0">
        <CardTitle class="text-sm font-medium">Totale Record</CardTitle>
        <Database class="h-4 w-4 text-muted-foreground" />
      </CardHeader>
      <CardContent>
        <div class="text-2xl font-bold">1,284</div>
        <p class="text-xs text-green-500">+12% da ieri</p>
      </CardContent>
    </Card>
    </div>
</template>