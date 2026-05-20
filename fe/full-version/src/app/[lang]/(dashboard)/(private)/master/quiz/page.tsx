import Grid from '@mui/material/Grid2'
import Typography from '@mui/material/Typography'
import ListQuizMaster from './ListQuizMaster'

export default function Page() {
    return <Grid container spacing={6}>

        <Grid size={{ xs: 12 }}>
            <ListQuizMaster></ListQuizMaster>
        </Grid>
    </Grid>
}