// MUI Imports
import CustomTextField from '@/@core/components/mui/TextField'
import { Button, Card, CardContent, CardHeader, Typography } from '@mui/material'
import Grid from '@mui/material/Grid2'
import EditQuizForm from './EditQuizForm'

export default function Page({ params }) {
    return <Grid container spacing={6}>
        <Grid size={{ xs: 12, md: 8 }}>
            <Grid container spacing={6}>
                <EditQuizForm quiz_id={params?.id}></EditQuizForm>
            </Grid>
        </Grid>
    </Grid>
}