<script setup>
import { Card, CardHeader, CardTitle, CardContent, CardDescription } from '@/components/ui/card'
import { Button } from '@/components/ui/button'
import { Badge } from '@/components/ui/badge'
import { Plus, Download, Trash2, Activity, Database, Users, ArrowUpRight } from 'lucide-vue-next'
</script>

<template>
  <div class="p-8 space-y-8 max-w-7xl mx-auto">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b pb-6">
      <div>
        <h2 class="text-4xl font-extrabold tracking-tight">Console Dati</h2>
        <p class="text-muted-foreground mt-1">Benvenuto nel pannello di controllo centralizzato.</p>
      </div>
      <Button class="shadow-lg shadow-primary/20 cursor-pointer">
        <Plus class="mr-2 h-4 w-4" /> Nuovo Inserimento
      </Button>
    </div>

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
      <Card v-for="i in 4" :key="i" class="hover:shadow-md transition-shadow">
        <CardHeader class="flex flex-row items-center justify-between pb-2">
          <CardTitle class="text-sm font-medium">Record Settore {{ i }}</CardTitle>
          <Activity class="h-4 w-4 text-primary" />
        </CardHeader>
        <CardContent>
          <div class="text-3xl font-bold">1,23{{ i }}</div>
          <div class="flex items-center text-xs text-green-600 mt-1">
            <ArrowUpRight class="h-3 w-3 mr-1" /> +{{ i * 4 }}% dal mese scorso
          </div>
        </CardContent>
      </Card>
    </div>

    <div class="grid gap-6 md:grid-cols-12">
      <Card class="md:col-span-8">
        <CardHeader>
          <CardTitle>Flusso Dati Settimanale</CardTitle>
          <CardDescription>Caricamenti analizzati per ogni giorno.</CardDescription>
        </CardHeader>
        <CardContent>
          <div class="h-[300px] flex items-end gap-3 px-2 pt-4 border-l border-b">
            <div v-for="val in [30, 80, 45, 90, 65, 85, 40]" :key="val" 
                 class="bg-primary/90 w-full rounded-t-sm hover:bg-primary transition-all relative group"
                 :style="{ height: val + '%' }">
                 <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-black text-white text-[10px] p-1 rounded opacity-0 group-hover:opacity-100 transition-opacity">{{ val }}%</span>
            </div>
          </div>
        </CardContent>
      </Card>

      <Card class="md:col-span-4">
        <CardHeader>
          <CardTitle>Attività Recente</CardTitle>
          <CardDescription>Ultimi movimenti nel DB.</CardDescription>
        </CardHeader>
        <CardContent class="space-y-6">
          <div v-for="item in 3" :key="item" class="flex items-start gap-4">
            <div class="h-8 w-8 rounded-full bg-slate-100 flex items-center justify-center">
              <Database class="h-4 w-4 text-slate-600" />
            </div>
            <div class="space-y-1">
              <p class="text-sm font-medium leading-none">Backup_Settembre.sql</p>
              <p class="text-xs text-muted-foreground">Generato con successo</p>
            </div>
            <Badge variant="secondary" class="ml-auto text-[10px]">OK</Badge>
          </div>
          
          <div class="pt-4 border-t space-y-2">
            <p class="text-xs font-semibold text-muted-foreground uppercase">Gestione Rapida</p>
            <Button variant="outline" class="w-full justify-start text-xs h-9 cursor-pointer"><Download class="mr-2 h-3 w-3" /> Esporta tutto</Button>
            <Button variant="ghost" class="w-full justify-start text-xs h-9 text-destructive hover:bg-destructive/10 cursor-pointer"><Trash2 class="mr-2 h-3 w-3" /> Pulisci Log</Button>
          </div>
        </CardContent>
      </Card>
    </div>
  </div>
</template>
