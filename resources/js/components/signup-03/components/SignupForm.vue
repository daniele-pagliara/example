<script setup>
import { cn } from '@/lib/utils';
import { Button } from '@/components/ui/button';
import {
  Card,
  CardContent,
  CardDescription,
  CardHeader,
  CardTitle,
} from '@/components/ui/card';
import {
  Field,
  FieldDescription,
  FieldGroup,
  FieldLabel,
} from '@/components/ui/field';
import { Input } from '@/components/ui/input';

const props = defineProps({
  class: { type: null, required: false },
  registerPostUrl: String,
  csrfToken: String,
  loginPostUrl: String
});
</script>

<template>
  <div :class="cn('flex flex-col gap-6', props.class)">
    <Card>
      <CardHeader class="text-center">
        <CardTitle class="text-xl"> Crea il tuo account </CardTitle>
        <CardDescription>
          Inserisci la tua email per creare un account
        </CardDescription>
      </CardHeader>
      <CardContent>
        <form :action="registerPostUrl" method="POST" class="space-y-4">
          <input type="hidden" name="_token" :value="csrfToken" />
          <FieldGroup>
            <Field>
              <FieldLabel for="name"> Nome completo </FieldLabel>
              <Input id="name" type="text" name="name" placeholder="John Doe" required />
            </Field>
            <Field>
              <FieldLabel for="email"> Email </FieldLabel>
              <Input
                id="email"
                type="email"
                name="email"
                placeholder="m@example.com"
                required
              />
            </Field>
            <Field>
              <Field class="grid grid-cols-2 gap-4">
                <Field>
                  <FieldLabel for="password"> Password </FieldLabel>
                  <Input id="password" type="password" name="password" required />
                </Field>
                <Field>
                  <FieldLabel for="confirm-password">
                    Conferma Password
                  </FieldLabel>
                  <Input id="password_confirmation" type="password" name="password_confirmation" required />
                </Field>
              </Field>
              <FieldDescription>
                La password deve contenere almeno 8 caratteri.
              </FieldDescription>
            </Field>
            <Field>
              <Button type="submit" class="cursor-pointer"> Crea Account </Button>
              <FieldDescription class="text-center">
                Hai già un account? <a :href="loginPostUrl" class="text-primary hover:underline font-medium">Accedi</a>
              </FieldDescription>
            </Field>
          </FieldGroup>
        </form>
      </CardContent>
    </Card>
    <FieldDescription class="px-6 text-center">
      Cliccando su continua, accetti i nostri
      <a href="#">Termini di Servizio</a> e <a href="#">Informativa sulla Privacy</a>.
    </FieldDescription>
  </div>
</template>
