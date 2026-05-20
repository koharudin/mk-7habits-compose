'use client'

import { useEffect, useState } from 'react'

// MUI Imports
import Card from '@mui/material/Card'
import CardHeader from '@mui/material/CardHeader'
import CardContent from '@mui/material/CardContent'
import Grid from '@mui/material/Grid2'
import Button from '@mui/material/Button'
import CircularProgress from '@mui/material/CircularProgress'

// Custom Imports
import CustomTextField from '@core/components/mui/TextField'

// Axios / API
import api from '@/utils/axios'
import { Typography } from '@mui/material'

const EditQuizForm = function ({ quiz_id }) {
    const [loading, setLoading] = useState(false)
    const [saving, setSaving] = useState(false)

    const [form, setForm] = useState({
        name: '',
        slug: '',
    })

    // Load quiz data
    const loadQuiz = async () => {
        try {
            setLoading(true)

            const res = await api.get('/quiz/' + quiz_id)

            const quiz = res.data?.data || res.data

            setForm({
                name: quiz.name || '',
                slug:quiz.slug
            })
        } catch (err) {
            console.error(err)
            alert('Gagal mengambil data quiz')
        } finally {
            setLoading(false)
        }
    }

    useEffect(() => {
        if (quiz_id) {
            loadQuiz()
        }
    }, [quiz_id])

    // Handle input
    const handleChange = (field, value) => {
        setForm(prev => ({
            ...prev,
            [field]: value
        }))
    }

    // Save data
    const saveQuiz = async () => {
        try {
            setSaving(true)

            await api.put('/quiz/' + quiz_id, form)

            alert('Quiz berhasil disimpan')
        } catch (err) {
            console.error(err)
            alert('Gagal menyimpan quiz')
        } finally {
            setSaving(false)
        }
    }

    if (loading) {
        return (
            <div className='flex justify-center p-10'>
                <CircularProgress />
            </div>
        )
    }

    return (
        <Card>
            <CardHeader title='Edit Quiz' />

            <CardContent>
                <Grid container spacing={6} className='mbe-6'>
                    <Grid size={{ xs: 12 }}>
                        <CustomTextField
                            fullWidth
                            label='Quiz Title'
                            placeholder='Masukkan judul quiz'
                            value={form.name}
                            onChange={e => handleChange('name', e.target.value)}
                        />
                    </Grid>

                    <Grid size={{ xs: 12 }}>
                       <Typography>{form?.slug}</Typography>
                    </Grid>

                    <Grid size={{ xs: 12 }}>
                        <Button
                            variant='contained'
                            onClick={saveQuiz}
                            disabled={saving}
                        >
                            {saving ? 'Saving...' : 'Save'}
                        </Button>
                    </Grid>
                </Grid>
            </CardContent>
        </Card>
    )
}

export default EditQuizForm