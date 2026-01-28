<script setup>
import { Button } from '@/components/ui/button'
import { Badge } from '@/components/ui/badge'
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card'
</script>

<template>
  <div class="flex flex-col gap-16 pb-16">
    <section class="relative bg-slate-50 py-20 px-4 text-center border-b">
      <div class="container mx-auto max-w-4xl space-y-6">
        <Badge variant="outline" class="px-4 py-1 border-primary/30 text-primary">
          Novità: Versione 1.0 disponibile!
        </Badge>
        <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight">
          Gestisci i tuoi progetti con <span class="text-primary">Eleganza</span>
        </h1>
        <p class="text-xl text-muted-foreground max-w-2xl mx-auto">
          La piattaforma moderna pensata per gli sviluppatori Laravel. Veloce, sicura e incredibilmente bella grazie a Shadcn-Vue.
        </p>
        <div class="flex justify-center gap-4 pt-4">
          <Button size="lg" class="px-8">Inizia Gratis</Button>
          <Button size="lg" variant="outline">Scopri di più</Button>
        </div>
      </div>
    </section>

    <section class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <Card class="hover:shadow-lg transition-shadow">
          <CardHeader>
            <CardTitle class="flex items-center gap-2">🚀 Performance</CardTitle>
          </CardHeader>
          <CardContent>
            <p class="text-muted-foreground">Velocità estrema grazie a Vite e Tailwind v4. Il caricamento è istantaneo.</p>
          </CardContent>
        </Card>

        <Card class="hover:shadow-lg transition-shadow">
          <CardHeader>
            <CardTitle class="flex items-center gap-2">🎨 Design</CardTitle>
          </CardHeader>
          <CardContent>
            <p class="text-muted-foreground">Componenti pronti all'uso, accessibili e totalmente personalizzabili.</p>
          </CardContent>
        </Card>

        <Card class="hover:shadow-lg transition-shadow">
          <CardHeader>
            <CardTitle class="flex items-center gap-2">🔒 Sicurezza</CardTitle>
          </CardHeader>
          <CardContent>
            <p class="text-muted-foreground">Integrato con i sistemi di autenticazione robusti di Laravel 11/12.</p>
          </CardContent>
        </Card>
      </div>
    </section>
  </div>
</template>